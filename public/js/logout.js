const logout = document.getElementById('logout');
if (logout instanceof HTMLElement) {
    logout.addEventListener('click', () => {
        fetch('/auth/logout', {method: 'post'}).then(() => window.location.reload());
    })
}

export {logout};