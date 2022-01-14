let checkboxes = document.getElementsByClassName('checkboxasdf');
for(let i= 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', check, false);
}

function check() {
    if(this.checked == true ) {
        this.value = 'true';
    } else {
        this.value = 'false';
    }
    this.parentElement.submit();
}