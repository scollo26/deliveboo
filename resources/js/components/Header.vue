<template>
    <nav class="delive-nav">
        <div class="container">
            <div class="logo-box">
                <router-link class="nav-link" :to="{ name: 'home' }">
                    <img id="logo" class="my-logo" :src="logo" alt="logo"/>
                </router-link>
            </div>
            
            <div class="navigation-option">
                <div  class="nav-menu d-none d-md-block">
                    <ul class="menu container"> 
                        <li
                            class="nav-item"
                            v-for="item in menuItems"
                            :key="item.id"
                        >
                        <router-link
                            class="nav-link"
                            :to="{ name: item.routeName }"
                            >{{ item.label }}</router-link
                        >
                        </li>
                        <li  class="nav-item">
                                <a class="nav-link" href="login">Accedi</a>
                        </li>
                        <li  class="nav-item">
                                <a class="nav-link" href="register"> Registrati </a>
                        </li>
                        <li  class="nav-item">
                                <a class="nav-link" href="logout"> Esci </a>
                        </li>
                    </ul>
                </div>


                <div class="cart-container">
                    <i  @click="clicked = !clicked" class="fa-solid fa-cart-shopping cart"></i>
                    <transition @before-enter="CartTailBE" @enter="CartTailEN" @leave="CartTailLE" :css="false">
                        <i v-if="clicked != false && list != '' && list != null" class="fa-solid fa-caret-up cart-tail"></i>
                    </transition>
                    <transition @before-enter="CartBE" @enter="CartEN" @leave="CartLE" :css="false">
                        <div v-if="clicked != false && list != '' && list != null" class="cart-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Quantità</th>
                                        <th scope="col">Prezzo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in list" :key="index">
                                        <td>
                                            {{ item.name }} 
                                        </td>
                                        <td class="quantity">
                                            <a class="quant" @click="addCartItem(item)"><i class="fa-solid fa-plus"></i></a>
                                            {{ item.quantity }}
                                            <a class="quant" @click="minusCartItem(item)"><i class="fa-solid fa-minus"></i></a>
                                        </td>
                                        <td>
                                            {{ item.price }}&euro;
                                        </td>
                                        <td><a class="trash" @click="removeCartItem(item)"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row justify-content-around">
                                <span class="col text-center" @click="clearCart">clear</span>
                                <span class="col text-center" @click="checkout">checkout</span>
                            </div>
                        </div>
                    </transition>
                </div>
                


                <i @click="showNavbar = !showNavbar" class="fa-solid fa-bars d-md-none d-block bar"></i>
                <transition @before-enter="HamBE" @enter="HamEN" @leave="HamLE" :css="false">
                <div v-show="showNavbar" class="hamburger-nav-menu d-md-none">
                    <ul class="hamburger container pt-3"> 
                        <li
                            class="nav-item"
                            v-for="item in menuItems"
                            :key="item.id"
                        >
                        <router-link
                            class="nav-link"
                            :to="{ name: item.routeName }"
                            >{{ item.label }}</router-link
                        >
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="login">Accedi</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="register"> Registrati </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="logout"> logout </a>
                        </li>
                    </ul>
                </div>
                </transition>

            </div>
        </div>
    </nav>
</template>

<script>
import EventBus from "../bus.js";
import Velocity from "velocity-animate";
export default {
    name: "Header",
    props: ["cards"],
    data() {
        return {
            showNavbar: false,
            clicked: false,
            countQuantity: false,
            list: null,
            restaurantID: null,
            logo: require("../../img/logo1.png"),
            menuItems: [
                {
                    label: "Home",
                    routeName: "home",
                },
                {
                    label: "Cerca",
                    routeName: "search",
                },
            ],
            bodyScrollHeight: null,
        };
    },
    created() {
        EventBus.$on("refresh_cart", (data) => {
            if(localStorage.getItem("cart") != null)
            {
                this.list = JSON.parse(localStorage.getItem("cart"));
                this.restaurantID = data;
            }
            else
            {
                this.list = null;
            }
        });
        EventBus.$on("update_header", (data) => {
            switch (data.option) {
                case 'add':
                    this.addCartItem(data.plate);
                    break;
                case 'minus':
                    this.minusCartItem(data.plate);
                    break;
                case 'remove':
                    this.removeCartItem(data.plate);
                    break;
                default:
                    console.log('update_header');
                    break;
            }
        });
        EventBus.$on("clear_cart", this.clearCart);
        EventBus.$on("check_log", (data) => {
            if(!data)
            {
                this.log = false;
            }
            else
            {
                this.log = true;
            }
        });
        EventBus.$on("close_cart", this.handleScroll);
        window.addEventListener('scroll', this.handleScroll);
        
    },
    methods: {
        clearCart() {
            localStorage.clear();
            this.list = null;
            EventBus.$emit("updated_cart", []);
        },
        removeCartItem(item) {
            this.list = this.list.filter((element) => element.id != item.id);
            if(this.list.length == 0)
            {
                this.clearCart();
            }
            else
            {
                EventBus.$emit("updated_cart", this.list);
                localStorage.setItem("cart", JSON.stringify(this.list));
            }
        },
        minusCartItem(item) {
            this.list.forEach(element => {
                if(item == element)
                {
                    let price = item.price/item.quantity;
                    item.quantity--;
                    item.price = item.price - price;
                    if(item.quantity == 0)
                    {
                        this.removeCartItem(element);
                        EventBus.$emit("update_checkout", this.list);
                        this.countQuantity = true
                    }
                }
            });
            if(this.countQuantity)
            {
                this.countQuantity = false
                EventBus.$emit("update_checkout", this.list);
            }
            else
            {
                localStorage.setItem("cart", JSON.stringify(this.list));
                EventBus.$emit("updated_cart", this.list); 
            }
        },
        addCartItem(item) {
            this.list.forEach(element => {
                if(item == element)
                {
                    let price = item.price/item.quantity;
                    item.quantity++;
                    item.price = item.price + price;
                }
            });
            localStorage.setItem("cart", JSON.stringify(this.list)); 
            EventBus.$emit("updated_cart", this.list);
            EventBus.$emit("update_checkout", this.list);
        },
        handleScroll() {
            this.clicked = false;
            this.showNavbar = false;
        },
        checkout() {
            if(this.list.length != 0)
            {
                this.$router.push({ name: 'checkout' });
            }
        },

        CartBE: function (el) {
            el.style.opacity = 0;
            el.style.top = "25%";
        },
        CartEN: function (el, done) {
            Velocity(
                el,
                { opacity: 1, top: "150%" },
                { duration: 300 },
                { complete: done }
            );
        },
        CartLE: function (el, done) {
            Velocity(el, { top: "25%", opacity: 0 }, { duration: 200 });
            Velocity(el, { display: "none" }, { complete: done });
        },

        CartTailBE: function (el) {
            el.style.opacity = 0;
            el.style.top = "25%";
        },
        CartTailEN: function (el, done) {
            Velocity(
                el,
                { opacity: 1, top: "110.5%"},
                { duration: 300 },
                { complete: done }
            );
        },
        CartTailLE: function (el, done) {
            Velocity(el, { top: "25%", opacity: 0 }, { duration: 200 });
            Velocity(el, { display: "none" }, { complete: done });
        },

        HamBE: function (el) {
            el.style.opacity = 0;
            el.style.right = "-20%";
        },
        HamEN: function (el, done) {
            Velocity(
                el,
                { opacity: 1, right: "0%" },
                { duration: 200 },
                { complete: done }
            );
        },
        HamLE: function (el, done) {
            Velocity(el, { right: "-20%", opacity: 0 }, { duration: 100 });
            Velocity(el, { display: "none" }, { complete: done });
        },
    },
    watch: {
        restaurantID:
            function()
            {
                console.log(this.restaurantID);
            }
        
    }
};
</script>

<style lang="scss" scoped>

.delive-nav {
    position: fixed;
    top: 0%;
    width: 100%;
    z-index: 1000;
    height: 80px;
    background-color: white;
    &>.container{
        height: 100%;
        display: flex;
        justify-content: space-between;
        .logo-box {
            display: flex;
            align-items: center;
            img {
                width: 120px;
            }
        }
        .navigation-option {
            display: flex;
            align-items: center;
            column-gap: 15px;
            .cart, .bar {
                position: relative;
                font-size: 25px;
                cursor: pointer;
            }
            .nav-menu {
                display: flex;
                align-items: center;
                .menu {
                    margin: 0;
                    list-style: none;
                    .nav-item {
                        display: inline-block;
                        .nav-link {
                            &:link, &:visited, &:hover, &:active {
                                color: black;
                                text-transform: uppercase;
                            }
                        }
                    }
                }
            }
            .hamburger-nav-menu {
                position: absolute;
                top: 100%;
                right: 0;
                width: 40%;
                height: 400%;
                z-index: -100;
                background-color: #ff4d31;
                .hamburger{
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end;
                    list-style: none;
                    .nav-link {
                        &:link, &:visited, &:hover, &:active {
                            color: white;
                            text-transform: uppercase;
                        }

                    }
                }
            }
        }
    }
}

.cart-container {
    position: relative;
}

.cart-box {
    font-size: 1em;
    position: absolute;
    top: 20%;
    right: 0;
    padding: 30px;
    width: 500px;
    opacity: 0;
    background-color:  #ffc626;
    border-radius: 20px 0px 20px 20px;
    table {
        thead {
            th:nth-child(2){
                padding: 0.5rem 2.1rem;
            }
        }
        tr {
            border-color: black;
            td {
                padding: 1rem 1rem;
                a {
                    text-decoration: underline;
                    cursor: pointer;
                    color: black;
                    &.quant {
                        margin: 0 0.5em;
                        padding: 2px 5px;
                        border: 1px solid black;
                        border-radius: 50%;
                    }
                    &.trash {
                        font-size: 1.3em;
                    }
                }
            }
        }
    }
    .row {
        margin-top: 2em;
        &>span {
            padding: 10px 20px;
            margin: 0 50px;
            border: 1px solid black;
            border-radius: 25px;
        }
    }
}

.cart-tail {
    position: absolute;
    font-size: 23px;
    right: 0;
    color: #ffc626;
}


</style>
