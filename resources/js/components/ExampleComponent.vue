<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <button class="btn btn-info" @click="seed">Seed</button>
                    </div>
                    <div v-for="(d, i) in nums" :key="i">
                        <button class="btn btn-danger" @click="del(d.id, i)" onclick="this.disabled = true; setTimeout(() =>  { this.disabled = false}, 700)">del</button>
                        {{ d.name }}
                    </div>
                    <button class="btn btn-primary" @click="more">More</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                nums: [],
                page: 1,
            }
        },
        methods: {
            seed () {
                axios.post('api/nums').then(d => {
                    this.nums = []
                    this.page = 1
                    this.more()
                })
            },
            more () {
                axios.get('api/nums?page=' + this.page).then(d => {
                    this.nums = this.nums.concat(d.data.data)
                    this.page++
                })
            },
            del (id, pos) {
                axios.delete('api/nums/' + id).then(d => {
                    axios.get('api/nums?page=' + this.nums.length + '&per_page=1').then(d => {
                        this.nums = this.nums.concat(d.data.data)
                        this.nums.splice(pos, 1)
                    })
                })
            },

        },
        mounted() {
            console.log('Component mounted.')
            this.more()
        }
    }
</script>
