// Variables
const UEmail = document.getElementById('UEmail');
const UPassword = document.getElementById('UPassword');
const BtnLogin = document.getElementById('BtnLogin');

// Eventos

document.addEventListener('DOMContentLoaded', () => {
    EventListenerLogin();
});

function EventListenerLogin() {
    BtnLogin.addEventListener('click', SendLogin);
};

// Metodos

const SendLogin = (e) => {
    e.preventDefault();

    let ConfigLogin = new FormData();
    ConfigLogin.append('UEmail', UEmail.value);
    ConfigLogin.append('UPassword', UPassword.value);

    axios.post('axios/user.axios.php', ConfigLogin)
        .then(response => {
            if (response.data.Code) {
                showMessage(response.data.Message, 'success');
                window.location.href = './user';
            } else {
                showMessage(response.data.Message, 'danger');
            }
        })
        .catch(error => showMessage(error, 'danger'));
}
