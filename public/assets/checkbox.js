let checkboxgroup = document.querySelectorAll('.JS_limitChoice')
let limit = 3
for (let i = 0; i < checkboxgroup.length; i++) {
    checkboxgroup[i].onclick = function() {
        let checkedcount = 0
            for (let i = 0; i < checkboxgroup.length; i++) {
            checkedcount += (checkboxgroup[i].checked) ? 1 : 0
        }
        if (checkedcount > limit) {
            this.checked = false;
        }
    }
}