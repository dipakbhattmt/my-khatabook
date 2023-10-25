<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "MonthlyView",
    props: ['activities', 'general'],
    data() {
        return {
            isOpen: 0
        }
    }
})
</script>

<template>
    <div class="columns is-multiline m-1">
        <div v-for="(type, index) in activities" :key="index" class="column is-4">
            <div class="box">
                <div class="inner-box">
                    <a>
                        קטגוריה:
                       <div class="tag is-small is-black">
                          <b>
                              {{type.type_name}}
                          </b>
                       </div>
                    </a>
                    <a>
                        סך הוצאות:
                       <div class="tag is-small is-black">
                           <b>
                               {{Intl.NumberFormat('he-IL', {style: 'currency', currency: 'ILS'}).format(type.total_amount)}}
                           </b>
                       </div>
                    </a>
                    <hr>
                    <h6 class="subtitle is-6-mobile has-text-centered">
                        פירוט הוצאות עבור הקטגוריה
                    </h6>
                    <b-collapse
                        class="card"
                        animation="slide"
                        v-for="(activity, index) of type['activities']"
                        :key="index"
                        :open="isOpen === index"
                        @open="isOpen = index"
                        :aria-id="'contentIdForA11y5-' + index">
                        <template #trigger="props">
                            <div
                                class="card-header"
                                role="button"
                                :aria-controls="'contentIdForA11y5-' + index"
                                :aria-expanded="props.open"
                            >
                                <p class="card-header-title">
                                    {{ activity.amount }}
                                </p>
                                <p class="card-header-title">
                                    {{ activity.info }}
                                </p>
                                <a class="card-header-icon">
                                    <b-icon
                                        :icon="props.open ? 'menu-down' : 'menu-up'">
                                    </b-icon>
                                </a>
                            </div>
                        </template>
                    </b-collapse>

                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.inner-box{
    display: flex;
    flex-direction: column;
}
</style>
