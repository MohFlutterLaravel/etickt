<template>
    <section class="data-info">
        <div v-if="loading == true" class="text-center m-4">
            <ProgressSpinner />
        </div>
        <div class="p-4 text-center" v-if="!offres.length">
            <lottie-animation
                path="lotties/coffe.json"
                :width="150"
                :height="150"
                />
            <p class="text-muted">Aucun information ..</p>
        </div>
        <div class="row">
            <div v-for="offre in offres" class="col-sm-12 col-md-12 col-lg-6">
                <div class="row mb-3 me-1">
                    <div class="col-lg-5 p-0">
                        <section style="border-top-left-radius:75px" class="bg-light h-100">
                            <div class="p-4 text-center">
                                <div class="mb-4">
                                    <Avatar :image="profile_picture != null?profile_picture:'images/owner.png'"
                                        shape="circle" size="xlarge" />
                                </div>
                                <div class="mb-2 text-muted"> {{offre.name}} </div>
                                <div class="social-media">
                                    <div class="m-2">
                                        <Avatar data-bs-toggle="tooltip" title="Email" data-bs-placement="right"
                                            icon="fa-solid fa-envelope" shape="circle" class="email" />
                                    </div>
                                    <div class="m-2">
                                        <Avatar data-bs-toggle="tooltip" title="Site web" data-bs-placement="right"
                                            icon="fa-solid fa-globe" shape="circle" class="website" />
                                    </div>
                                    <div class="m-2">
                                        <Avatar data-bs-toggle="tooltip" title="Localisation" data-bs-placement="right"
                                            icon="fa-solid fa-location-dot" shape="circle" class="location" />
                                    </div>
                                </div>
                                <div style="margin-top: 1.5em;">
                                    <a class="btn btn-success" href="#">Voir plus ..</a>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-7 p-0">
                        <section style="border-bottom-right-radius:75px" class="bg-light p-3 h-100">
                            <div class="d-flex justify-content-between">
                                <h3>{{offre.title}}</h3>
                                <div style="margin-left: 1.5rem;">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                            </div>
                            <p class="text-muted">{{offre.address}}</p>
                            <p>{{offre.description}}</p>
                            <div class="row">
                                <div class="col">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                    {{offre.mobile_one}}
                                    <span v-if="offre.mobile_two != null">/</span>
                                    {{offre.mobile_two}}
                                </div>
                                <div v-if="offre.fix != null" class="col">
                                    <i class="fa-solid fa-phone"></i>
                                    {{offre.fix}}
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-8">
                    <nav>
                        <ul class="pagination">
                            <li v-bind:class="{disabled: !pagination.first_link}" class="page-item"><a href="#"
                                    @click="getResults(pagination.first_link)" class="page-link">&laquo;</a></li>
                            <li v-bind:class="{disabled: !pagination.prev_link}" class="page-item"><a href="#"
                                    @click="getResults(pagination.prev_link)" class="page-link">&lt;</a></li>
                            <li v-for="n in pagination.last_page" v-bind:key="n"
                                v-bind:class="{active: pagination.current_page == n}" class="page-item"><a href="#"
                                    @click="getResults(pagination.path_page + n)" class="page-link">{{n}}</a></li>
                            <li v-bind:class="{disabled: !pagination.next_link}" class="page-item"><a href="#"
                                    @click="getResults(pagination.next_link)" class="page-link">&gt;</a></li>
                            <li v-bind:class="{disabled: !pagination.last_link}" class="page-item"><a href="#"
                                    @click="getResults(pagination.last_link)" class="page-link">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4">
                    Page: {{pagination.from_page}} - {{pagination.to_page}}
                    Total: {{pagination.total_page}}
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    import Avatar from 'primevue/avatar';
    import ProgressSpinner from 'primevue/progressspinner';
    import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
    export default {
        name: 'Card',
        components: {
            Avatar,
            ProgressSpinner,
            LottieAnimation
        },
        props: {
            data: Object
        },
        watch: { 
            data: function() { 
                this.getResults();
            }
        },
        data() {
            return {
                pagination: {},
                offres: [],
                loading: true,
            }
        },
        mounted() {
            this.getResults();
        },
        methods: {
            getResults(page) {
                this.offres = []
                this.loading = true
                page = page || 'api/guests/offresCheck'
                var self = this

                const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
                axios.post(page, {category_id:self.$props.data.id},{
                        headers: headers,
                    })
                    .then(response => {
                        self.loading = false
                        let res = response.data[0]
                        self.offres = res.data;
                        self.pagination = {
                            current_page: res.current_page,
                            last_page: res.last_page,
                            from_page: res.from,
                            to_page: res.to,
                            total_page: res.total,
                            path_page: res.path + "?page=",
                            first_link: res.first_page_url,
                            last_link: res.last_page_url,
                            prev_link: res.prev_page_url,
                            next_link: res.next_page_url,
                        }
                        this.loading_offre = true
                    }).catch(err => {
                        if (err.response) {
                            if (err.response.status == 403) {
                                //this.$router.push({name: '403'})
                            }

                        }

                    });

            },
        }
    }

</script>

<style>
</style>
