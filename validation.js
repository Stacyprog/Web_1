function formValidation()
{
    var y = document.information.y;
    var x = document.information.clicked_x;
    var check = true;
    if(!y_validation(y,-3,5)) {
        check = false;
    }
    if (!r_validation()) {
        check = false;
    }
    if (!x_validation(x)) {
        check = false;
    }
    return check;
}

function x_validation(x) {
    var x_len = x.value.length;
    var x_value = x.value;
    if (x_len == 0 || isNaN(x_value)) {
        error1.innerHTML = "Введите значение X";
        return false;
    }
    else error1.innerHTML = null;
    return true;
}

function y_validation(y,min,max)
{
    var y_value = y.value.replace(",", ".");
    var y_len = y.value.length;
    if (y_value < min || y_value > max || y_len == 0 || isNaN(y_value))
    {
        error2.innerHTML = 'Введите значение Y от ' + min + ' до ' + max;
        return false;
    }
    else error2.innerHTML = null;
    return true;
}



function r_validation() {

    var r_len = document.information.r.value;
    if (isNaN(r_len) || r_len == 0) {
        error3.innerHTML = "Пожалуйста, выберите значение R";
        return false;
    } else {
        error3.innerHTML = null;
        return true;
    }
}
