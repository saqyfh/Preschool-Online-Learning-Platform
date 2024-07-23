const product = [
    {
        id : 101,
        image: '1.png',
        title: 'Video',
        price: 40,
    },

    {
        id: 102,
        image: '2.png',
        title: 'Games',
        price: 60,
    }, 
    
    {
        id: 103,
        image: '3.png',
        title: 'Worksheets',
        price: 30,
    }, 

    {
        id: 104,
        image: '4.png',
        title: 'Video & Games',
        price: 100,
    }, 

    {
        id: 105,
        image: '5.png',
        title: 'Video & Worksheet',
        price: 70,
    }, 

    {
        id: 106,
        image: '6.png',
        title: 'Worksheets & Games',
        price: 90,
    }, 

    {
        id: 107,
        image: '7.png',
        title: 'Video & Worksheet & Games',
        price: 130,
    }

];

const categories = [...new Set(product.map((item)=>
    {return item}))]
    let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {id, image, title, price} = item;
    return(
        `<div class='box'>
            <div class='img-box'>
                <img class='images' src=${image}></img>
            </div>
        <div class='bottom'>        
        <p>${title}</p>
        <h2>RM${price}.00</h2>`+
        "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
        `</div>
        </div>`
    )
}).join('')

var cart= [];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}
function delElement(a){
    cart.splice(a, 1);
    displaycart();
}

function displaycart(){
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "RM"+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>
        {
            var {id, image, title, price} = items;
            total=total+price;
            document.getElementById("total").innerHTML = "RM"+total+".00";
            return(
                `<div class='cart-item'>
                <div class='row-img'>
                    <img class='rowimg' src=${image}>
                </div>                
                <p style='font-size: 17px;'>${title}</p>
                <label>Package ID: <input type='hidden' name='cartProductID[]' value='${id}' readonly></label>
                <h2 style='font-size: 17px;'>RM${price}.00</h2>`+
                "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>"
            );
        }).join('');
    }

    
}