const showMessage = (Message, Type) => {

    // const colors = ['primary', 'warning', 'info', 'success', 'secondary', 'danger', 'light'];

    const alert = document.createElement('div');
    alert.innerHTML = `
                <div class="d-flex justify-content-between">
                    <p class="mb-0">${Message}</p>
                    <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="alert"
                    aria-label="Close"
                    ></button>
                </div>
                `;
    alert.classList.add('alert', 'fade');

    document.body.appendChild(alert);

    const alertInstance = new mdb.Alert(alert, {
        color: Type,
        position: 'bottom-center',
        hidden: true,
        delay: 5000,
        autohide: true,
        width: '600px',
        offset: 20,
        stacking: false,
        appendToBody: false,
    });

    alertInstance.show();
};