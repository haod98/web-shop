
const loginInTab = document.querySelector('.j-loginInTab');
const registerTab = document.querySelector('.j-registerTab');
const loginForm = document.querySelector('.j-loginForm');
const registerForm = document.querySelector('.j-registerForm');
const selectedClass = 'user-login-container__btn--active'; //Class name of selected button

const changeLoginForm = (clickedForm, currentSelectedForm, hideForm, showSelectedForm) => {
    if (clickedForm.classList.contains(selectedClass)) {
        return;
    };
    currentSelectedForm.classList.remove(selectedClass);
    clickedForm.classList.add(selectedClass);
    hideForm.classList.add('hide');
    showSelectedForm.classList.remove('hide');
}

loginInTab.addEventListener('click', () => changeLoginForm(loginInTab, registerTab, registerForm, loginForm));
registerTab.addEventListener('click', () => changeLoginForm(registerTab, loginInTab, loginForm, registerForm));
