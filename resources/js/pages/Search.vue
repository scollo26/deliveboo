<template>
    <div>
        <div class="container">
            <div class="row search p-3">
                <div class="col-12">
                    <form>
                       
                        <div class="row ">
                            <div class="mb-3 ">
                                <!-- <div
                                    class="d-flex align-items-center justify-content-around"
                                >
                                    <div
                                        :key="'categories-' + index"
                                        v-for="(category, index) in categories"
                                    >
                                        <input
                                            type="checkbox"
                                            name="categories[]"
                                            :value="category.id"
                                            v-model="form.categories"
                                        />
                                        <label :for="category.name">
                                            <img
                                                :src="category.img_category"
                                                alt="category.name"
                                            />
                                            {{ category.name }}
                                        </label>
                                    </div>
                                </div> -->
                                <div class="home-categories-carousel mt-5">
                                    <div class="mycontainer col-5 col-sm-6 col-md-12  col-lg-12">
                                        <h2>
                                            Scegli la tua categoria preferita
                                        </h2>
                                        <div class="carousel-container  mt-5 ">
                                            <!-- <div
                                                :key="'categories-' + index"
                                                v-for="(
                                                    category, index
                                                ) in categories"
                                                :class="category.active ? 'category-card cardActive' : 'category-card'"
                                                @click.prevent="
                                                    setActive(index)
                                                "
                                            > -->
                                            
                                                <div
                                                    v-for="(category, index) in categories"
                                                    :key="index"
                                                    class= "category-card"
                                                    :id="index"
                                                    @click="setActive(index)"
                                                >
                                                <div class="shadow-card" v-show="active.includes(index)" :id="index">
                                                    
                                                </div>
                                                
                                                <!-- <input
                                                    type="checkbox"
                                                    name="categories[]"
                                                    :value="category.id"
                                                    v-model="form.categories"
                                                /> -->


                                                <img
                                                    class="carousel-img"
                                                    :src="category.img_category"
                                                    alt="category.name"
                                                />
                                                <span class="carousel-text">
                                                    {{ category.name }}
                                                </span>
                                            </div>
                                        </div>
                                        <input class="btn align-middle mt-3 " 
                                            type="button"
                                            value="FILTRA"
                                            @click.prevent="searchRestaurants"
                                        />
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <Main
            class="mt-3"
            :cards="cards"
            @changePage="changePage($event)"
        ></Main>
    </div>
</template>

<script>
import Axios from "axios";
import EventBus from "../bus.js";
import Main from "../components/Main.vue";
import Home from "../pages/Home.vue";
export default {
    name: "Search",
    components: {
        Main,
        Home,
    },
    data() {
        return {
            form: {
                orderbycolumn: "name",
                orderbysort: "desc",
                categories: [],
            },
            cards: {
                restaurants: null,
                next_page_url: null,
                prev_page_url: null,
                current_page: null,
            },
            active: [],
            categories: null,
        };
    },
    created() {
        this.getRestaurants("http://127.0.0.1:8000/api/search");
        this.getCategories();
        EventBus.$emit("close_cart");
        // localStorage.clear('cart');
    },
    methods: {
        changePage(vs) {
            let url = this.cards[vs];
            if (url) {
                this.getRestaurants(url);
            }
        },
        getRestaurants(url) {
            Axios.get(url, {
                params: this.form,
            }).then((result) => {
                this.cards.restaurants = result.data.results.data;
                this.cards.next_page_url = result.data.results.next_page_url;
                this.cards.prev_page_url = result.data.results.prev_page_url;
                this.cards.current_page = result.data.results.current_page;
            });
        },
        searchRestaurants() {
            const url = "http://127.0.0.1:8000/api/search";
            Axios.get(url, {
                params: this.form,
            }).then((result) => {
                this.cards.restaurants = result.data.results.data;
                this.cards.next_page_url = result.data.results.next_page_url;
                this.cards.prev_page_url = result.data.results.prev_page_url;
                this.cards.current_page = result.data.results.current_page;
            });
        },
        getCategories() {
            const url = "http://127.0.0.1:8000/api/v1/categories";
            Axios.get(url).then((result) => {
                this.categories = result.data.results.data;
                this.categories.forEach((element) => {
                    element.active = false;
                });
            });
        },
        setActive(index) {
            if(this.active.includes(index))
            {
                this.active = this.active.filter(element => element != index)
                let transictionArray = [];
                this.active.forEach(element => {
                    transictionArray.push(element + 1)
                });
                this.form.categories = transictionArray
                console.log(index);
            }
            else
            {
                console.log(index);
                this.active.push(index);
                this.form.categories.push(index + 1)
            }
        },
    },
    watch: {
        form: {
            handler() 
            {
                console.log(this.form.categories);
            },
            deep: true,
        },
    },
};
</script>

<style lang="scss" scoped>
.row {
    padding: 2em 0;
    h1 {
        text-transform: uppercase;
    }
}

.home-categories-carousel {
    text-align: center;

    .mycontainer {
        padding-top: 30px;
        padding-bottom: 40px;
        width: 100%;
    }

    .carousel-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 10px;
        width: 100%;
        // border: 2px solid grey;
    }

    .category-card {
        display: inline-block;
        margin: 10px;
        background-color: rgba(239, 242, 244, 0.8);
        border: 2px solid grey;
        border-radius: 30px;
        transition: all 0.4s;
        width: calc(100% / 4);
        flex: 1 0 auto;
        position: relative;

        &:hover {
            cursor: pointer;
            box-shadow: 0 0 6px darkgrey;
        }
    }

    .shadow-card {
        height: 100%;
        width: 100%;
        position: absolute;
        border-radius: 30px;
        border: 2px solid rgba(255, 168, 3, 0.7);
        box-shadow: 0 0 10px orange;
    }

    .carousel-img {
        width: 60px;
    }

    .carousel-text {
        font-size: 1.12em;
        font-weight: bold;
    }
    .btn{
        padding: 0.5em 2em;
        background-color: orange;
    }

    @media (min-width: 300px) and  (max-width: 768px){

       .carousel-container{
            .category-card{
                width: 45%;
            }

       } 
    }
}
    


</style>
