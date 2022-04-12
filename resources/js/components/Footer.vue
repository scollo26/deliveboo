<template>
    <div class="footer">
        <div class="footer_contained">
            <div class="list_title">
                Project Collaborators <i class="fa-brands fa-github"></i>
        
            </div>
            <ul>
                <li><a href="https://github.com/mark5041">Mark5041</a></li>
                <li><a href="https://github.com/Dandav2923">Dandav2923</a></li>
                <li><a href="https://github.com/ElperdonXV">Davide Martino</a></li>
                <li><a href="https://github.com/scollo26">Scollo26</a></li>
                <li><a href="https://github.com/UrbanoG2">UrbanoG2</a></li>
            </ul>
        </div>

        <div class="footer_image"></div>
    </div>
</template>

<script>
export default {
    name: 'Footer',
}
</script>

<style lang="scss" scoped>

    .footer{
        background-color: #ffc526c0;
        text-align: center;
        display: flex;
        justify-content: space-around;
        padding-top: 30px;
        padding-bottom: 25px;
    }

    .footer_contained {
        padding: 1.5em;
        // margin-left: 20%;
    }
    .list_title {
        font-weight: bold;
        font-size: 1em;
        margin-left: 10%;
        width: 100%;
        text-transform: uppercase;
    }
    ul {
        list-style: none;
    }

    ul li a {
        text-decoration: none;
        color: black;
        font-size: 0.9em;
        font-style: oblique;
        box-shadow: inset 0 0 0 0 ffc526c0;
        margin: 0 -.25em;
        padding: 0 .25em;
        transition: color .4s ease-in-out, box-shadow .3s ease-in-out;
    }

    ul li a:hover {
        text-decoration: underline;
        box-shadow: inset 100px 0 0 0 #ff4d31;
        color: white;
    }

    .footer_image {
        height: 150px;
        width: 17%;
        background-position: center;
        background-size: cover;
        background-image: url("../../../public/images/footer_img.png");
        margin-top: 15px;
    }
</style>