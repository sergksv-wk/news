<template>
    <b-menu>
        <b-menu-list label="Новостные категории">
            <b-menu-item v-for="item in newsList"
                 :key="item.id"
                 :label="item.name + ' '+item.news_count"
                 :href="'/news/'+encodeURI(item.name)"
            >

            </b-menu-item>
        </b-menu-list>
    </b-menu>
</template>

<script>
export default {
    name: "news_cat_list",
    data(){
        return {
            newsList: []
        }
    },
    methods:{
        loadData(){
            // копируем объекты, чтобы не ссылаться на них через this
            let thisVueObject = this

            let fd = new FormData()

            fd.append('search', this.searchText)

            axios.post("/api/cat_list", fd).then(
                response => {
                    if (
                        response
                        && response.data
                    ) {
                        let data = response.data
                        if (data.error) {
                            throw new TypeError(data.message)
                        } else {
                            thisVueObject.newsList = data;
                        }
                    } else {
                        throw new TypeError('Сервер не отвечает')
                    }
                },
                err => {
                    console.error( err+ ' Code 10001')
                    return false
                }
            ).catch(
                err => {
                    console.error( err+ ' Code 10002')
                    return false
                }
            )
        }
    },
    created: function(){
        this.loadData();
    }
}
</script>

<style scoped>

</style>
