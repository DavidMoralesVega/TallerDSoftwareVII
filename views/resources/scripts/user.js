// Variables
// AddUser
const AUName = document.getElementById('AUName');
const AUIdentity = document.getElementById('AUIdentity');
const AUAddress = document.getElementById('AUAddress');
const AUCellular = document.getElementById('AUCellular');
const AUEmail = document.getElementById('AUEmail');
const AUType = document.getElementById('AUType');

const BtnAdd = document.getElementById('BtnAdd');

// Eventos
document.addEventListener('DOMContentLoaded', () => {
    EventListenerUser();
});

function EventListenerUser() {
    BtnAdd.addEventListener('click', InsertUser);
};

// Metodos
const InsertUser = () => {
    console.log('Usuario insertado');

    const NewUser = {
        UName: AUName.value,
        UIdentity: AUIdentity.value,
        UAddress: AUAddress.value,
        UCellular: AUCellular.value,
        UEmail: AUEmail.value,
        UType: AUType.value
    };

    let FormAddUser = new FormData();
    FormAddUser.append('NewUser', JSON.stringify(NewUser));


    axios.post('axios/user.axios.php', FormAddUser)
        .then((response => {
            console.log('COmunicacion exitosa');
        }))
        .catch(error => {
            console.log('Error en el servidor', error);
        })

    console.log(FormAddUser);
};