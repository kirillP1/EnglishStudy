var countOfFields = document.getElementsByClassName('wordPart').length; // Текущее число полей
var curFieldNameId = document.getElementsByClassName('wordPart').length; // Уникальное значение для атрибута name
var wordPart = document.getElementsByClassName('wordPart').length;

var maxFieldTestLimit = 7;
var maxFieldLimit = 15;// Максимальное число возможных полей

function deleteField(a) {
    if (countOfFields > 1)
    {

        // Уменьшаем значение текущего числа полей
        countOfFields--;

        var childDivs = document.querySelectorAll('.wordPart');
        var div = childDivs[countOfFields];
        console.log('div = '+ div);
        var parentDiv = div.parentNode;
        console.log('parentDiv = '+ parentDiv);
        console.log('count = ' + countOfFields);

        // Получаем доступ к ДИВу, содержащему поле
        var contDiv = div;
        // Удаляем этот ДИВ из DOM-дерева
        contDiv.parentNode.removeChild(contDiv);
    }
    // Возвращаем false, чтобы не было перехода по сслыке
    return false;
}
function addField(a) {

    // Проверяем, не достигло ли число полей максимума
    if (countOfFields >= maxFieldLimit) {
        alert("Число полей достигло своего максимума = " + maxFieldLimit);
        return false;
    }
    // Увеличиваем текущее значение числа полей
    countOfFields++;
    // Увеличиваем ID
    curFieldNameId++;
    // Создаем элемент ДИВ
    var div = document.createElement("div");
    div.className = "wordPart";
    // Добавляем HTML-контент с пом. свойства innerHTML
    div.innerHTML = "<nobr><input class=\"form-control-plaintext\" name=\"word[" + countOfFields + "]\" type=\"text\" placeholder=\"Слово на английском\"/> <input class=\"form-control-plaintext\" name=\"trans[" + countOfFields + "]\" type=\"text\" placeholder=\"Перевод\"/></nobr>";
    // Добавляем новый узел в конец списка полей
    document.getElementById("parentId").appendChild(div);
    // Возвращаем false, чтобы не было перехода по сслыке
    return false;
}

function addTestField(a) {

    // Проверяем, не достигло ли число полей максимума
    if (countOfFields >= maxFieldTestLimit) {
        alert("Число полей достигло своего максимума = " + maxFieldTestLimit);
        return false;
    }
    // Увеличиваем текущее значение числа полей
    countOfFields++;
    // Увеличиваем ID
    curFieldNameId++;
    // Создаем элемент ДИВ
    var div = document.createElement("div");
    div.className = "wordPart";
    // Добавляем HTML-контент с пом. свойства innerHTML
    div.innerHTML = " <nobr><div><input class=\"form-control-plaintext\"  name=\"testName[" + countOfFields + "]\" type=\"text\" placeholder=\"Вопрос\"/></div> <div><input  checked type=\"radio\" name=\"test[" + countOfFields + "]\" value=\"1\"> <input class=\"form-control-plaintext\" name=\"first[" + countOfFields + "]\" type=\"text\" placeholder=\"Вариант ответа 1\"/></div> <div><input type=\"radio\" name=\"test[" + countOfFields + "]\" value=\"2\"><input class=\"form-control-plaintext\" name=\"second[" + countOfFields + "]\" type=\"text\" placeholder=\"Вариант ответа 2\"/></div> <div><input type=\"radio\" name=\"test[" + countOfFields + "]\" value=\"3\"> <input  class=\"form-control-plaintext\" name=\"third[" + countOfFields + "]\" type=\"text\" placeholder=\"Вариант ответа 3\"/></div> </nobr>";
    // Добавляем новый узел в конец списка полей
    document.getElementById("parentTestId").appendChild(div);
    // Возвращаем false, чтобы не было перехода по сслыке
    return false;
}