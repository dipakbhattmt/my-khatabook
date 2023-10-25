<template>
    <section>

        <div class="table-operations">
          <button v-if="checkedRows.length > 0" @click="deleteRecord" class="button is-small is-danger">
              {{text.delete}}
          </button>

            <button v-show="checkedRows.length" @click="checkedRows = []"
                    class="button is-small field is-info">
                <span v-text="text.uncheck"></span>
            </button>
        </div>

        <b-tabs>
            <b-tab-item :label="text.type">
                <b-table
                    :checked-rows.sync="checkedRows"
                    :columns="cols"
                    :data="data"
                    :loading="loading"
                    checkable>
                </b-table>
            </b-tab-item>
        </b-tabs>
        <div class="table-operations" v-show="checkedRows.length > 10">
            <button v-if="checkedRows.length > 0" @click="deleteRecord" class="button is-small is-danger">
                {{text.delete}}
            </button>

            <button @click="checkedRows = []"
                    class="button is-small field is-info">
                <span v-text="text.uncheck"></span>
            </button>
        </div>
    </section>
</template>


<script>
    import {EventBus} from "../app";

    export default {
        mounted() {
            this.loadData()
        },
        data() {
            return {
                cols: [],
                data: [],
                checkedRows: [],
                loading: false,
                text: {
                    type: balance.type,
                    delete: balance.delete,
                    uncheck: balance.uncheck
                }
            }
        },
        methods: {
            loadData() {
                axios.get('/fetch-data-table').then(({data}) => {
                    this.data = data.dataset;
                    let columnsNames = [];
                    for (let i = 0; i < data.columns.length; i++) {
                        let row = {
                            field:  data.columns[i],
                            label:data.columns[i] === 'name' ? 'שם תגית': data.columns[i] === 'id' ? '#' : ' שם עמודה',
                            searchable: data.columns[i] === 'name',name
                        };
                        columnsNames.push(row);
                        this.cols = columnsNames;
                    }
                })
            },
            deleteRecord() {
                let url = `/types/`;
                this.loading = true;
                this.checkedRows.forEach(function (row) {
                    axios.delete(url + row.id).then(function (response) {
                        EventBus.$emit('flash', response.data)
                    })
                });
                this.loadData();
                this.checkedRows = [];
                this.loading = false;
            },
        }
    }
</script>

<style scoped>
    thead {
        direction: ltr;
    }
    .button{
        margin: 8px;
    }
    .table-operations{
       display: flex;
        justify-content: center;
    }
</style>
