// Variables
const SelectClient = document.getElementById('SelectClient');
const BtnSaveSale = document.getElementById('BtnSaveSale');
const IdUserSession = document.getElementById('IdUserSession');

const ContainerListProducts = document.getElementById('ContainerListProducts');
const ContainerListCart = document.getElementById('ContainerListCart');

let DetaillProducts;


// Eventos
document.addEventListener('DOMContentLoaded', () => {
    EventListenerSale();
    GetClients();
    GetProducts();
});

function EventListenerSale() {
    BtnSaveSale.addEventListener('click', SaveSale);
    ContainerListProducts.addEventListener('click', AddProduct);
    ContainerListProducts.addEventListener('change', AddProductsss);
    
};

// Metodos
const GetClients = () => {

    let ConfigClient = new FormData();
    ConfigClient.append('Table', 'client');

    axios.post('axios/heritage.axios.php', ConfigClient)
        .then(response => {

            if (response.data.Code) {


                response.data.List.forEach(element => {

                    // <option value="1">Alvaro</option>

                    const Option = document.createElement('option');
                    Option.setAttribute('value', element.IdClient);
                    Option.append(`${element.CName} - ${element.CIdentity}`);

                    SelectClient.appendChild(Option);


                });

            }




        })
        .catch(error => showMessage(error, 'danger'));

};

const GetProducts = () => {

    let ConfigClient = new FormData();
    ConfigClient.append('Table', 'product');

    axios.post('axios/heritage.axios.php', ConfigClient)
        .then(response => {

            if (response.data.Code) {

                response.data.List.forEach(element => {

                    const TemplateProduct = `<li class="ItemProduct list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">${element.PDescription}</div>
                                                    ${element.PPrice} Bs. - <span class="badge rounded-pill bg-info">${element.PStock}</span> 
                                                </div>
                                                <button
                                                    Description="${element.PDescription}"
                                                    IdProduct="${element.IdProduct}"
                                                    Price="${element.PPrice}"
                                                    type="button"
                                                    class="BtnAddProduct btn btn-success btn-floating"
                                                >
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </li>`;

                    let TemplateConvert = new DOMParser().parseFromString(TemplateProduct, 'text/html').body.querySelector('.ItemProduct');

                    ContainerListProducts.append(TemplateConvert);

                });



            }

        })
        .catch(error => showMessage(error, 'danger'));

};

const SaveSale = (e) => {
    e.preventDefault();

    const NewSale = {
        IdClient: SelectClient.value,
        IdUser: IdUserSession.value
    };

    PrepareDetaillProducts();

    let ConfigSendSale = new FormData();
    ConfigSendSale.append('DataSale', JSON.stringify(NewSale));
    ConfigSendSale.append('DataProducts', JSON.stringify(DetaillProducts));

    axios.post('axios/sale.axios.php', ConfigSendSale)
        .then(response => {
            if (response.data.Code) {
                showMessage(response.data.Message, 'success');

                // Genere el pdf
                window.open('extent/tcpdf/pdf/report-sale.php?IdSale=' + response.data.IdSale);
            }
        })
        .catch(error => showMessage(error, 'danger'));



};

const AddProduct = (e) => {
    e.preventDefault();

    // console.log(ContainerListProducts.querySelector('.ItemProduct .BtnAddProduct'));
    if (e.target.classList.contains('BtnAddProduct')) {


        // let Product = e.target.attributes['Product'].value;

        let IdProduct = e.target.attributes['IdProduct'].value;
        let Description = e.target.attributes['Description'].value;
        let Price = e.target.attributes['Price'].value;


        const TemplateNewItem = `<li IdProduct="${IdProduct}" class="ItemProductCart list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">${Description}</div>
                                        <h6 class="mt-3">${Price} Bs.</h6>
                                        <input class="CartAmount" type="number" min="1" value="1">
                                        <h6 class="mt-3">Sub total : <strong>899 Bs.</strong></h6>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-floating">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </li>`;

        let TemplateItemConvert = new DOMParser().parseFromString(TemplateNewItem, 'text/html').body.querySelector('.ItemProductCart');

        ContainerListCart.append(TemplateItemConvert);

        PrepareDetaillProducts();
    }





}


const AddProductsss = (e) => {
    e.preventDefault();
    console.log(e);
    // console.log(ContainerListProducts.querySelector('.ItemProduct .BtnAddProduct'));
    if (e.target.classList.contains('CartAmount')) {


        console.log(e.target);





    }
}

const PrepareDetaillProducts = () => {

    let ItemProductCart = document.getElementsByClassName('ItemProductCart');
    let CartAmount = document.getElementsByClassName('CartAmount');

    let PrepareDetaillProducts = [];

    ItemProductCart.forEach((element, index) => {

        let IdProduct = element.attributes['IdProduct'].value;
        let Amount = CartAmount[index].value;

        let NewProduct = {
            IdProduct: IdProduct,
            SDAmount: Amount
        };

        PrepareDetaillProducts.push(NewProduct);
    });


    DetaillProducts = PrepareDetaillProducts;


}