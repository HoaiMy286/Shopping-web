
class ProductIndex
{
    constructor()
    {
        this.show();    
        setTimeout(() => {
            this.showby();
        }, 50);
    }
    show(_get = "")
    {
        let products = "";
        let url = "index.php?controller=product&action=getitem&" + _get ;
        fetch(url,{
            method: "GET"
        })  
        .then((response) => response.json())
        .then((data) => {
            for (let index = 0; index < data.length; index++) {
                products += 
                `<div class="card_c col" id = "` + data[index].id + `">
                <span class="like addToFvr"><i class="fa-sharp fa-solid fa-heart-circle-plus"></i></span>
                <span class="cart addToCart"><i class="fa-solid fa-cart-plus" ></i></span>
                <div class="card-img">
                    <div class="card__img">
                    <img src="` + data[index].src + `" alt="" />
                    </div>
                </div>
                <h2 class="card__title">Nike Zoom KD 12</h2>
                <p class="card__price">$99</p>
                <div class="card__action">
                    <div class="card-color-size">
                        <div class="card__size">
                            <h5>Size:</h5>
                            <span>6</span>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                        </div>
                        <div class="card__color">
                            <h5>Color:</h5>
                            <span class="green"></span>
                            <span class="red"></span>
                            <span class="black"></span>
                        </div>
                    </div>
                    <div class="card-detail-buy">
                        <button class ="card-detail">Detail</button>
                        <button class ="card-buy">Buy now</button>
                    </div>
                </div>
            </div>`;
            }
            document.getElementById("products").innerHTML = products;
            setTimeout(() => {
                this.addcart();
                this.addlike();
                this.showheart();
                this.showcart();
                this.showdetail();
            }, 50);
        }); 
    }
    showby()
    {
        const select = Array.from(document.getElementsByClassName("select"))
        select.forEach(element => {
            let id = element.id;
            element.addEventListener("click", () =>{
                this.show(id);
            })
        })
    }
    showdetail()
    {
        const showDetail = Array.from(document.getElementsByClassName("card-detail"));
        showDetail.forEach((element) => {
            let url = "index.php?controller=product&action=getitem&id=" + element.parentElement.parentElement.parentElement.id;
            element.addEventListener("click",() => {
                fetch(url,{
                    method: "GET"
                })
                .then((response) => response.json())
                .then(data => {
                    document.getElementById("detailProduct").innerHTML = Object.values(data[0]) ;
                });
            });
        });
    }
    addcart()
    {
        const addCart = Array.from(document.getElementsByClassName("addToCart"));
        addCart.forEach((element) => {
            element.addEventListener("click" , () => {
                let url = "index.php?controller=cart&id=" + element.parentElement.id;
                fetch(url,{
                    method : "GET"
                })
                .then((response) => response.json())
                .then((data) => document.getElementById("numCart").innerHTML = Object.values(data));
            });  
        }); 
    }

    addlike()
    {
        const addLike = Array.from(document.getElementsByClassName("addToFvr"));
        addLike.forEach((element) => {
            element.addEventListener("click" ,() => {
                let url = "index.php?controller=like&id=" + element.parentElement.id;
                fetch(url,{
                    method : "GET"
                })
                .then((response) => response.json())
                .then((data) => console.log(Object.values(data)));
            });  
        });
    }


    showcart()
    {
        document.getElementById('btnCart').addEventListener("click" , () => {
            return window.open("index.php?controller=cart&action=showcart", "_self");
        });
    }
    showheart()
    {
        document.getElementById('btnHeart').addEventListener("click" , () => {
            window.open("index.php?controller=like&action=showlike", "_self");
        });
    }


    

}
//////
const productIndex = new ProductIndex();

