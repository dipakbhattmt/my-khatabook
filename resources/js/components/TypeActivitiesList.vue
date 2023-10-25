<template>
    <section>
        <div class="box">
            <h6 class="title is-6">הצגת מידע מתקופה אחרת</h6>
            <div class="select">

                <select id="selectDataPeriod">
                    <option v-for="(option, index) in subMonthesArray"
                            :key="index"
                            :data-year="option.year"
                            :value="option.month"
                    >
                        {{ option.monthName }} {{ option.year }}
                    </option>
                </select>
            </div>
            <button class="button is-info is-outlined" @click="getMoreDataForThisType">הצג</button>
        </div>
        <h5 class="title is-5">{{ translations.title }}</h5>
        <b-collapse
            v-for="(collapse, index) of collapses"
            :key="index"
            :open="isOpen === index"
            class="card"
            @open="isOpen = index">
            <div
                slot="trigger"
                slot-scope="props"
                class="card-header"
                role="button">
                <p class="card-header-title">
                    {{ translations.amount }} {{ collapse.amount }} {{ translations.currency }}
                </p>
                <a class="card-header-icon">
                    <b-icon
                        :icon="props.open ? 'mdi mdi-menu-up-outline' : 'mdi mdi-menu-down-outline'">
                    </b-icon>
                </a>
            </div>
            <div class="card-content">
                <div class="content">
                    {{ translations.info }} {{ collapse.info }}
                    <hr>
                    {{ translations.confirmation }} {{ collapse.confirmation }}
                    <hr>
                    {{ translations.bill_number }} {{ collapse.bill_id }}
                    <hr>
                    {{ translations.paid_at }} {{ collapse.paid_at }}
                    <hr>
                    <a :href="`/activities/${collapse.id}`">{{ translations.show_activity }}</a>
                </div>
            </div>
        </b-collapse>
    </section>
</template>

<script>
import {EventBus} from "../app";

export default {
    mounted() {
        this.collapses = window.balance.typeActivitiesList
    },
    data() {
        return {
            typeId: parseInt(location.pathname.split('/')[2]),
            isOpen: 0,
            collapses: [],
            translations: window.balance.paymentsListTranslations,
            subMonthesArray: window.balance.subMonthes

        }
    },

    methods: {
        getMoreDataForThisType() {
            let dropdown = document.getElementById("selectDataPeriod");
            let month = dropdown.options[dropdown.selectedIndex].value;
            let year = dropdown.options[dropdown.selectedIndex].dataset.year;
            let id = this.typeId

            axios.post('/data-for-another-period', {
                month: month,
                year: year,
                type_id: id
            }).then(({data}) => {
                if (!data.length) {
                    EventBus.$emit('flash', 'אין תשלומים עבור החודש הזה')
                }
                if (data.length) {
                    this.collapses = data
                    EventBus.$emit('flash', 'המידע נוסף לרשימה בהצלחה')
                }
            }).catch((error) => {
                console.log(error)
            })

        }
    }
}
</script>
