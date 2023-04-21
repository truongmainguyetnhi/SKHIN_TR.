$("#menu").hide();
$("#menusp").click(function() {
    $(this).next().slideDown(300);
});
$("#menu").mouseleave(function() {
    $(this).slideUp("fast");
});
const btn = document.querySelectorAll(".gio")
btn.forEach(function(button, index) {
    button.addEventListener("click", function(event) {
        {
            var btnItem = event.target
            var product = btnItem.parentElement
            var productImg = product.querySelector("img").src
            var productName = product.querySelector("h1").innerText
            var productPrice = product.querySelector("span").innerText
            addcart(productPrice, productImg, productName)
        }
    })
})

function addcart(productPrice, productImg, productName) {

    var totalC = 0
    var res = getLocalDataValue();
    var product = res.find(x => x.productName === productName);

    if (product != null && product != undefined) {
        product.inputValue += 1;
    } else {
        var inputValue = 1
        totalA = inputValue * productPrice
        totalC += totalA
        res.push({
            productName: productName,
            productImg: productImg,
            productPrice: productPrice,
            inputValue: inputValue,
        })
    }

    localStorage.setItem("mind", JSON.stringify(res))
    var cartTotalA = document.querySelector(".price_total span")
    cartTotalA.innerHTML = totalC.toLocaleString('de-DE')
    var inputS = document.querySelector(".cart_icon sup")
    inputS.innerHTML = res.length

}

function isNumeric(str) {
    if (typeof str != "string") return false // we only process strings!  
    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
        !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}

// ---------totalprice--------
function carttotal() {
    var totalC = 0
    var res = getLocalDataValue();

    for (var i = 0; i < res.length; i++) {
        totalAmount = res[i].inputValue * res[i].productPrice
        totalC += totalAmount
    }
    localStorage.setItem("mind", JSON.stringify(res))
    var cartTotalA = document.querySelector(".price_total span")
    cartTotalA.innerHTML = totalC.toLocaleString('de-DE')
    var inputS = document.querySelector(".cart_icon sup")
    inputS.innerHTML = res.length
}
// ----------delete---------
function deleteCart() {
    var cartItem = document.querySelectorAll("tbody tr")
    for (var i = 0; i < cartItem.length; i++) {
        var productN = document.querySelectorAll(".delete")
        productN[i].addEventListener("click", function(event) {
            var cartdelete = event.target
            var cartitemR = cartdelete.parentElement.parentElement
            cartitemR.remove()
            var productName = cartitemR.querySelector(".title").innerHTML
            var localData = localStorage.getItem("mind")
            if (localData === null) {
                localData = []
            } else {
                localData = JSON.parse(localData)
                var res = []
                for (var i in localData)
                    res.push(localData[i]);
                res = res.filter(x => x.productName !== productName);
                localStorage.setItem("mind", JSON.stringify(res));
                var inputS = document.querySelector(".cart_icon sup")
                inputS.innerHTML = res.length;
                carttotal();
            }
        })
    }

}

function inputchange() {
    var cartItem = document.querySelectorAll("tbody tr")
    for (var i = 0; i < cartItem.length; i++) {
        var inputValue = cartItem[i].querySelector("input")
        inputValue.addEventListener("change", function() {
            var productName = inputValue.parentElement.parentElement.querySelector(".title").innerHTML
            var res = getLocalDataValue();
            var productChange = res.find(x => x.productName === productName)
            if (productChange != null && productChange != undefined) {
                productChange.inputValue = inputValue.value;
                localStorage.setItem("mind", JSON.stringify(res))
            }
            carttotal()
        })
    }


}
const cartbtn = document.querySelector(".x")
const cartshow = document.querySelector(".cart_icon")
cartshow.addEventListener("click", function() {
    document.querySelector(".cart").style.right = "0"
    var res = getLocalDataValue();
    var cartTable = document.querySelector("tbody")
    for (var i in res) {
        var addtr = document.createElement("tr")
        var data = res[i];
        addtr.innerHTML = '<tr><td style="display:flex; align-items:center;"><img style="width: 70px;" src="' + data.productImg + '" ><span class="title">' + data.productName + '</span></td><td><p><span class="prices">' + data.productPrice + '</span><sup>₫</sup></p></td><td><input style="width:30px;outline: none;" type="number" value=' + data.inputValue + ' min="1"> </td><td style="cursor:pointer;"><span class="delete">Xóa</span></td></tr>'
        cartTable.append(addtr)
    }
    deleteCart();
    inputchange();
    carttotal();

})
cartbtn.addEventListener("click", function() {
    document.querySelector(".cart").style.right = "-100%"
    var addtr = document.getElementById("myTable")
    addtr.innerHTML = "";

})

function getLocalDataValue() {
    var res = []
    var localData = localStorage.getItem("mind")
    if (localData === null) {
        localData = []
    } else {
        localData = JSON.parse(localData)
        for (var i in localData)
            res.push(localData[i]);
    }
    return res
}

$(document).ready(function() {
    var inputS = document.querySelector(".cart_icon sup")
    inputS.innerHTML = getLocalDataValue().length;
})