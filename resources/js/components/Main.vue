<template>
    <div class="container">
        <div class="row g-4" v-if="cards != null">
            <div
                class="col-12 col-md-4"
                v-for="(restaurant, index) in cards.restaurants"
                :key="index"
            >
                <div class="color-cart h-100">
                    <div class="container-image">
                        <img
                        :src="restaurant.banner_img"
                        class="card-img-top"
                        :alt="restaurant.name"
                    />

                    </div>
                    
                    <div class="card-body ">
                        <h5 class="card-title display-6 fw-bold ">
                            {{ restaurant.name }}
                        </h5>
                        <p class="card-text">
                            <i class="fa-solid fa-location-dot"></i>&nbsp;
                            {{ restaurant.address }}
                        </p>
                        <p class="fst-italic grey "> {{restaurant.descrizione}}</p>
                        <h5>Specialità del Ristorante</h5>
                        <ul
                            
                            class="card-text flex"
                            v-for="(category, id) in restaurant.categories"
                            :key="id"
                        >
                            
                            <li>{{ category.name }}</li>
                        </ul>
                        
                    </div>
                    <div class="d-flex justify-content-center visita">
                        <div
                        class=" btn btn-color" data-bs-toggle="modal"  data-bs-target="#exampleModal"
                        @click="checkLastID(restaurant.id, restaurant.slug)"
                    >
                        Visita
                    </div>

                    </div>
                    
                </div>
            </div>
        </div>
        <div v-show="cards.restaurants == ''" class="row text-center">
            <div class="col">
                <h1>Nessun risultato</h1>
            </div>
        </div>
        <div class="row bottom" v-if="cards != null">
            <ul
                v-if="cards.prev_page_url || cards.next_page_url"
                class="list-inline d-flex justify-content-center align-items-center"
            >
                <li
                    v-if="!cards.next_page_url && cards.prev_page_url"
                    class="list-inline-item"
                >
                    <h1>{{ cards.current_page }}</h1>
                </li>
                <li class="list-inline-item">
                    <button
                        v-if="cards.prev_page_url"
                        class="btn btn-page"
                        @click="changePage('prev_page_url')"
                    >
                        Prev
                    </button>
                </li>
                <li
                    v-if="cards.prev_page_url && cards.next_page_url"
                    class="list-inline-item"
                >
                    <h1>{{ cards.current_page }}</h1>
                </li>
                <li class="list-inline-item">
                    <button
                        v-if="cards.next_page_url"
                        class="btn btn-page"
                        @click="changePage('next_page_url')"
                    >
                        Next
                    </button>
                </li>
                <li v-if="!cards.prev_page_url" class="list-inline-item">
                    <h1>{{ cards.current_page }}</h1>
                </li>
            </ul>
        </div>

        <div class="delete-mes text-center" v-if="alertMessage">
            <div class="container">
                <div class="row">
                    <h1>Cambiando ristorante perderai tutti gli elementi salvati nel carrello <br> Vuoi procedere?</h1>
                </div>
                <div class="row justify-content-around">
                    <button class="action-btn" @click="alertMessage = false">
                        Torna indietro
                    </button>
                    <button class="action-btn" @click="removeCart()">
                        Procedi
                    </button>
                </div>
            </div>
        </div>

        <!-- <div v-if="alertMessage" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambiando ristorante perderai gli elementi attualmente salvati nel carrello.
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        Vuoi continuare?
                    </div>
                    <div class="modal-footer">
                        <button class="btn-primary" @click="alertMessage = false">
                            Chiudi
                        </button>
                        <button class="btn-primary" @click="removeCart()">
                            Conferma
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import EventBus from "../bus.js";
export default {
    name: "Main",
    props: ["cards"],
    data() {
        return {
            lastIDRestaurant: null,
            alertMessage: false,
        };
    },
    created() {
        this.lastIDRestaurant = localStorage.getItem("id");
    },
    methods: {
        changePage(vs) {
            this.$emit("changePage", vs);
        },
        checkLastID(id,slug) {
            if (
                this.lastIDRestaurant == id ||
                localStorage.getItem("cart") == null
            ) {
                let params = {
                    name: "restaurant",
                    params: { id: id, slug: slug },
                };
                this.newIDRestaurant = null;
                this.newSLUGRestaurant = null;
                this.$router.push(params);
            } else {
                this.alertMessage = true;
                this.newIDRestaurant = id;
                this.newSLUGRestaurant = slug;4
            }
        },
        removeCart() {
            let params = {
                name: "restaurant",
                params: { id: this.newIDRestaurant, slug: this.newSLUGRestaurant },
            };
            this.alertMessage = false;
            EventBus.$emit("clear_cart");
            this.$router.push(params);
        },
    },
    watch: {
        cards: {
            handler() {},
            deep: true,
        },
    },
};
</script>

<style lang="scss" scoped>
.bottom {
    margin-top: 3em;
    
}

ul {
    display: inline;
    padding: 1%;
    li {
        display: inline;
    }
}
.delete-mes {
    position: fixed;
    width: 450px;
    height: 300px;
    top: 20%;
    right: 35.3%;
    background-color: #fcbd10ea;
    border-radius:20px;

    h1 {
        padding: 40px;
        font-size: 1.9em;
        font-weight: bold;
    }

    .action-btn {
        width: 30%;
        border: 1px solid #ff4c31d6;
        background-color: #ffc526c0;
        padding: 10px 0px;
    }

    .action-btn:hover {
        color: white;
        background-color: #ff4c31d6;
    }
}

img {
    height: 100%;
}
.card-text {
    font-size: 1.2em;
    color: grey;
}

.col-12 {
    .color-cart {
        background-color: #f8d574  ;
        border-radius: 10px;
        position: relative;
        .button {
        width: 20%;
        }
        .btn-color{
            
            background-color: orange !important;
        } 
        .container-image{
            
            height: 250px;
        }
        .visita{
            position: absolute;
            top: 45%;
            left: 70%;
        }
    }
    .card-body{
        p{
            color: grey;
        }
    }
    
    
    
    
}

    .btn-page{
        
        background-color: orange ;
    } 
</style>
