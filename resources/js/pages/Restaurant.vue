<template>
    <div class="container-fluid my-padding">
        <div class="container white p-0">
            <div class="relative">
                <div class="my-banner">
                    <img :src="restaurant.banner_img" alt="">
                </div>
                <div class="my-absolute-logo shadow">
                    <img  :src="restaurant.logo_img" alt="">
                </div>
                <div class="title">
                    <div class="name">
                        <h1 class="fw-bold">{{restaurant.name}}</h1>
                    </div>
                    <div class="address">
                        <h4 class="mt-1"><i class="fa-solid fa-location-dot"></i>&nbsp;{{restaurant.address}}</h4>
                    </div>
                </div>            
            </div>
            <div class="content text-center p-5">
                <div class="mb-4">
                    <h4>{{restaurant.descrizione}}</h4>
                </div>
                <div class="section-title pt-5">
                    <h3 class="fw-bold">Menù</h3>
                </div>
                <div class="container">
                    <div v-for="(section, index) in plates" :key="index" class="row mt-3 p-5 pt-0">
                        <div class="mt-4 mb-4">
                            <h4 class="section-subtitle text-center fw-bold"> {{ getNameSection(index) }}</h4>
                        </div>
                        <div v-tilt="{reverse: true, max: 5, scale: 1.08, speed: 1000, perspective: 1200}" v-for="(plate, index) in section" :key="index" class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="my-card relative">
                                
                                <img
                                    :src="plate.preview"
                                    class="img-box"
                                    :alt="plate.name"
                                />
                                <div class="overlay">
                                    <h3 class="bold">{{ plate.name }}</h3>
                                    <div class="food-info ingredienti ">
                                        <p class="ms-2">
                                            {{ plate.ingredients }}
                                        </p>
                                        <h6 class="ms-1">{{ plate.price }} &euro;</h6>
                                        <a
                                            class="btn-add-cart"
                                            @click="addItemToCart(plate.id, plate.price, plate.name)"
                                            ><i class="fa-solid fa-plus plus-hover"></i>
                                            <i class="fa-solid fa-cart-shopping cart-hover"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        
        <div class="maps text-center">
            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.792869463778!2d12.480764051214418!3d41.897311472088276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f604d442317b9%3A0x98e404577e346793!2sPalazzo%20Guglielmi%2C%2000187%20Roma%20RM%2C%20Italia!5e0!3m2!1sit!2sfr!4v1649344199687!5m2!1sit!2sfr" width="600" height="450" style="border:0; height: 100%; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>    
</template>

<script>
import Axios from "axios";
import EventBus from "../bus.js";;
export default {
    name: "Restaurant",
    props: ["id", "slug"],
    data() {
        return {
            restaurant: null,
            plates: [],
            tags: [],
            cartItem: [],
            cart: null,
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/restaurant/" + this.slug;
        if (this.getCartItem() != null) {
            let localData = JSON.parse(this.getCartItem());
            localData.forEach((element) => {
                this.cartItem.push(element);
            });
        }
        this.getProduct(url);
        EventBus.$emit("refresh_cart", this.id);
        EventBus.$on("updated_cart", (data) => {
            this.cartItem = data;
        });
        
    },
    methods: {
        getProduct(url) {
            Axios.get(url)
                .then((result) => {
                    this.restaurant = result.data.results.restaurant;
                    this.plates = result.data.results.plates;
                    this.tags = result.data.results.tags;
                    this.filterPlates();
                })
                .catch((error) => console.log(error));
        },
        filterPlates() {
            this.plates = this.plates;
        },

        getCartItem() {
            return localStorage.getItem("cart");
        },

        addItemToCart(id, price, name) {
            if(this.cartItem.length != 0)
            {
                this.cartItem.forEach((element) => {
                    if (element.id == id) {
                        this.findItem = true;
                        element.quantity++;
                        element.price = parseFloat(element.quantity * price);
                    }
                });
            }

            if (this.findItem) {
                this.findItem = false;
            } else {
                let newItem = {
                    id: id,
                    name: name,
                    restaurant: parseInt(this.id),
                    quantity: 1,
                };
                newItem.price = parseFloat(newItem.quantity * price);
                this.cartItem.push(newItem);
                this.findItem = false;
            }
            
            localStorage.setItem("id", this.id);
            localStorage.setItem("cart", JSON.stringify(this.cartItem));
            EventBus.$emit("refresh_cart", this.id);
        },
        getNameSection(index) {
            let tagName
            this.tags.forEach(element => {
                if(element.id == index)
                {
                    tagName = element.name;
                }
            });

            return tagName
        }
    },
};
</script>

<style lang="scss" scoped>




.my-padding{
    // padding-top: 100px;
    padding: 80px  0px;
    padding-bottom: 0px;
    background-color: #fafafa;
    .white{
        background-color: white;
    }
    .relative{
        position: relative;
        .my-absolute-logo{
            margin: 0 auto;
            transform: translate(-0, -50%);
            width: 180px;
            height: 180px;
            border-radius: 50%;
            img{
                border-radius: 50%;
                width: 100%;
                height: 100%; 
                object-fit: cover;
            }
        }
        .title{
            margin: 0 auto;
            text-align: center;
            transform: translate(-0, -70%);
            .name{
                h1{
                    font-size: 3em;
                }
            }
            .address{
                h4{
                    color: lightgrey;
                    font-size: 1.2em;
                }
            }
        }
    }
    .my-banner{
        height: 400px;
        width: 100%;
        padding: 0;
        img{
            width: 100%;
            height: 100%; 
            object-fit: cover;
        }
    }
    .my-card{
        position: relative;
        .img-box{
            width: 100%;
            height: 100%; 
            object-fit: cover;
        }
        .overlay{
            position: absolute;
            display: none;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 20px;
            color: white;
        }
    }
    .my-card:hover .overlay{
        background-color: rgba(0, 0, 0, 0.598);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .section-title{
        h3{
            font-size: 3em;
        }
    }
    .section-subtitle{
        text-transform: uppercase;
    }
    .content{
        margin: 0 auto;
    }
}

.maps {
    height: 300px;
}

.food-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    .btn-add-cart {
        margin-top: 0.4em;
        padding: 11px 11px;
        max-width: 37px;
        background-color: #ff4d31;
        border-radius: 25px;
        position: relative;
        display: flex;
        justify-content: center;
        // align-items: center;

        .plus-hover {
            color: #fafafa;
            visibility: hidden;
            position: absolute;
        }

        .cart-hover {
            color: #fafafa;
        }

    }

    // .btn-add-cart:hover .plus-hover {
    //     display: inline-block;
    // }

    // .btn-add-cart:hover .cart-hover {
    //     display: none;
        
    // }




    .btn-add-cart:hover {

        @keyframes cartAnimation{

            0%{
                opacity: 1;
                transform: rotateX(90deg);
            }

            50%{
                opacity: 0.8;
                transform: rotateX(0deg);
            }

            100%{
                display: none;
                opacity: 0;
                transform: rotateX(180deg);
            }
        }

        .cart-hover {
            animation-name: cartAnimation;
            animation-duration: 1000ms;
            animation-fill-mode: forwards;
        }
    }


    .btn-add-cart:hover {
        @keyframes plusAnimation {
            to   {visibility: visible;}
        }

        .plus-hover {
            animation: plusAnimation 0s 1s forwards;
            visibility: hidden;
        }
    }

   

    
}

    



@media screen and (max-width: 992px)
{
    .my-card {
        height: 240px;
    }  
}

@media screen and (min-width: 992px)
{
    .my-card {
        height: 316px;
    }  
}

</style>
