<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" v-model="selected">
                        <option disabled value="">Please choose a Crawler</option>
                        <option v-for="crawler in crawlers" :key="crawler" :value="crawler">Crawler {{crawler}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" v-model="selectedOption">
                        <option disabled value="">Please choose a Table</option>
                        <option v-for="table in tables" :key="table" :value="table">{{table}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-control" v-model="selectedColumn">
                    <option disabled value="">Please choose a Column</option>
                    <option v-for="column in columns" :key="column" :value="column">{{column}}</option>
                </select>
                <br>
                <transition name="fade">
                    <button type="" class="btn btn-primary mb-2 checksubmit" @click="connect()" v-if="selectedColumn !=''">Check</button>
                </transition>
                
                <!-- <label for="" v-if="datacount === 0">No connection</label>
                <label for="" v-else>The table have {{datacount}}</label> -->
            </div>
        </div>
        
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Others Fields
                    </button>
                </h5>
                </div>
                
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
                            </p>
                            <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Title
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Error</td>
                            <td><button type="button" class="btn btn-primary">Primary</button></td>
                            <td><button type="button" class="btn btn-primary">Primary</button></td>
                            <td><button type="button" class="btn btn-primary">Primary</button></td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Pictures
                    </button>
                </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Table from './Table.vue';
export default {
    components: {
    'abc': Table,
    },
    mounted() {
        console.log("Component mounted.");
        axios.get(`/connectlist`)
                .then(res => {
                    this.crawlers = res.data;
                }).catch(e => {
                    console.log(e);
                });

    },
    data: function() {
        return {
            selected: "",
            tables: [],
            records:'No Connect',
            selectedOption: '',
            datacount:0,
            selectedColumn:'',
            columns:[],
            crawlers:[],
        };
    },
    watch:{
            selected: function(){
                axios.get(`/gettablelist/${this.selected}`)
                .then(res => {
                    this.tables = res.data; 
                }).catch(e => {
                    console.log(e);
                });
            },
            selectedOption: function(){
                axios.get(`/getcolumnlist/${this.selected}/${this.selectedOption}`)
                .then(res => {
                    this.columns = res.data;
                }).catch(e => {
                    console.log(e);
                });
            }
    },
    methods:{
        connect: function(){
            axios.get(`/connectdata/${this.selected}/${this.selectedOption}`)
                .then(res => {
                    this.datacount = res.data;
                }).catch(e => {
                    console.log(e);
                });
            
        }
    }
};
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>

