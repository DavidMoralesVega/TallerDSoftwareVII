// Variables
// AddUser
const AUName = document.getElementById('AUName');
const AUIdentity = document.getElementById('AUIdentity');
const AUAddress = document.getElementById('AUAddress');
const AUCellular = document.getElementById('AUCellular');
const AUEmail = document.getElementById('AUEmail');
const AUType = document.getElementById('AUType');

const BtnAdd = document.getElementById('BtnAdd');

const TableUser = document.querySelector('#TableUser tbody');
console.log(TableUser);
// Eventos
document.addEventListener('DOMContentLoaded', () => {
    EventListenerUser();
    GetUsers();
});

function EventListenerUser() {
    BtnAdd.addEventListener('click', InsertUser);
};

// Metodos
const InsertUser = () => {

    const NewUser = {
        UName: AUName.value,
        UIdentity: AUIdentity.value,
        UAddress: AUAddress.value,
        UCellular: AUCellular.value,
        UEmail: AUEmail.value,
        UType: AUType.value,
        UPassword: 'Password'
    };


    let FormAddUser = new FormData();
    FormAddUser.append('NewUser', JSON.stringify(NewUser));


    axios.post('axios/user.axios.php', FormAddUser)
        .then((response => {
            console.log(response.data);
            if (response.data.code) {
                showMessage('Registro exitoso', 'success');
            }
        }))
        .catch(error => showMessage(error, 'danger'));

};


const GetUsers = () => {
    let FormGetUsers = new FormData();
    FormGetUsers.append('GetUsers', 'Hola');

    axios.post('axios/user.axios.php', FormGetUsers)
        .then((response => {
            if (response.data.Code) {

                response.data.ListUser.forEach(element => {
                    console.log(element.UEmail);

                    let ValidateState = (element.UState === '1') ?
                        `<span class="badge bg-success">Activo</span>` :
                        `<span class="badge bg-danger">Pasivo</span>`;


                    const TemplateUser = `<tr class="RowUser">
                                            <td> ${element.IdUser} </td>
                                            <td> ${element.UName} </td>
                                            <td> ${element.UIdentity} </td>
                                            <td> ${element.UAddress} </td>
                                            <td> ${element.UCellular} </td>
                                            <td> ${element.UEmail} </td>
                                            <td> ${element.UType} </td>
                                            <td> ${ValidateState} </td>
                                        </tr>`;

                    console.log(TemplateUser);

                    let TemplateUserConvert = new DOMParser().parseFromString(TemplateUser, 'text/html').body;

                    console.log(TemplateUserConvert);

                    TableUser.append(TemplateUserConvert);


                });
            }
        }))
        .catch(error => showMessage(error, 'danger'));
};