<template>
    <div>
        <h1>
            <div class="columns">
                <div class="column"><a href="/"><img src="https://cdn0.iconfinder.com/data/icons/set-app-incredibles/24/Home-01-512.png" style="width:3rem;hight:3rem;"></a></div>
                <div class="column">{{cat_name}}</div>
                <div class="column">{{ category.news_count}}</div>
            </div>
        </h1>
        <b-pagination
            :total="total"
            :current.sync="current"
            :range-before="rangeBefore"
            :range-after="rangeAfter"
            :order="order"
            :size="size"
            :simple="isSimple"
            :rounded="isRounded"
            :per-page="perPage"
            :icon-prev="prevIcon"
            :icon-next="nextIcon"

            @change="pageChanged"

            aria-next-label="Next page"
            aria-previous-label="Previous page"
            aria-page-label="Page"
            aria-current-label="Current page">
        </b-pagination>
        <item_row v-for="el in newsList" :key="el.id" :item="el"/>
    </div>
</template>

<script>
export default {
    name: "cat_name_list",
    props:{
        cat_name: String
    },
    data(){
        return {
            category: Object,
            newsList: [],
            total: 0,
            current: 1,
            perPage: 10,
            rangeBefore: 1,
            rangeAfter: 1,
            order: '',
            size: '',
            isSimple: false,
            isRounded: false,
            prevIcon: 'chevron-left',
            nextIcon: 'chevron-right'
        }
    },
    methods:{
        refreshData(){
            // копируем объекты, чтобы не ссылаться на них через this
            let thisVueObject = this

            let fd = new FormData()

            fd.append('cat_name', this.cat_name)
            fd.append('page', this.current)

            axios.post("/api/cat_news/", fd).then(
                response => {
                    if (
                        response
                        && response.data
                    ) {
                        let data = response.data
                        if (data.error) {
                            throw new TypeError(data.message)
                        } else {
                            thisVueObject.category = data.category
                            thisVueObject.total = data.category.news_count
                            thisVueObject.newsList = data.news.data
                        }
                    } else {
                        throw new TypeError('Сервер не отвечает')
                    }
                },
                err => {
                    console.error( err+ ' Code 20001')
                    return false
                }
            ).catch(
                err => {
                    console.error( err+ ' Code 20002')
                    return false
                }
            )
        },
        pageChanged(val){
            this.refreshData()
        }
    },
    created() {
        this.refreshData();
    }
}
</script>

<style scoped>

</style>
