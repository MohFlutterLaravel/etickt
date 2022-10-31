<template>
    <div class="d-flex justify-content-between">
        <h1> List des offres </h1>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-transparent" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-filter" style="font-size: 1.2em;"></i>
                {{filterText}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li @click="data = {'id': 0, 'category_name': 'Tout'}; this.filterText = 'Tout les categories'"><a class="dropdown-item" href="#">Tout les categories</a></li>
                <li @click="data = category; this.filterText = category.category_name" v-for="category in categories"><a class="dropdown-item" href="#">{{category.category_name}}</a></li>
            </ul>
        </div>
    </div>
    <!--Avatar image="images/owner.png" shape="circle" size="xlarge" /-->
    <Card :data="data" />
</template>

<script>
import Card from '../ui/Card.vue'
    export default {
        components: {
            Card,
        },
        data(){
            return{
                data: {
                    'id': null,
                    'category_name': null
                },
                filterText: '',
                categories: [],
            }
        },
        created(){
            let self = this
            const url = 'api/guests/business-categories'
            const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            axios.get(url, {headers: headers})
            .then(res=>{
                self.categories = res.data[0]
            })
            .catch(err =>{
                console.log(err);
            })
        },
        
    }
</script>

<style>
</style>
