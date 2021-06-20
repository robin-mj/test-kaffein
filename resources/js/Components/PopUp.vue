<template>
    <div class="fixed z-30 top-0 bottom-0 left-0 right-0 bg-opacity-50 bg-black flex items-center justify-center">

        <div class="bg-white p-12 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-gray-900">
            <i @click="cancel" class="absolute top-2.5 right-3 text-lg text-purple cursor-pointer fas fa-times"></i>
            <div class="flex justify-between space-x-20 mb-5">
                <div class="flex">
                    <div class="mr-5 p-20 bg-purple"></div>
                    <div class="flex flex-col font-montserrat font-medium text-lg">
                        <h2 class="mb-3 capitalize font-bold text-purple text-2xl">{{ companyData.name }}</h2>
                        <a :href="'//' + companyData.domain" target="_blank" class="underline hover:text-purple transition duration-200 ease-in-out">{{ companyData.domain }}</a>
                        <a :href="'tel:' + companyData.phone" class="mb-3">{{ companyData.phone }}</a>
                        <div class="flex items-center">
                            <a v-if="companyData.email" :href="'mailto:' + companyData.email"><i class="mr-5 text-purple text-xl fas fa-envelope"></i></a>
                            <a v-if="companyData.phone" :href="'tel:' + companyData.phone"><i class="text-purple text-xl transform rotate-90 fas fa-phone"></i></a>
                        </div>
                    </div>
                </div>

                <div class="text-right font-montserrat font-medium text-lg">
                    <p class="mb-3 text-2xl">{{ companyData.city }}</p>
                    <p>{{ companyData.zip_code }}</p>
                    <p>{{ companyData.country }}</p>
                </div>
            </div>

            <div class="flex space-x-10 mb-5 font-montserrat font-semibold text-lg text-purple">
                <p v-if="companyData.industry">{{ companyData.industry }}</p>
                <p v-else>Secteur d'activités non renseigné</p>

                <p v-if="companyData.number_of_employees">{{ addSpacesToNumber(companyData.number_of_employees) }} employés</p>
                <p v-else>Nombre d'employés non renseigné</p>

                <p v-if="companyData.annual_revenue">{{ addSpacesToNumber(companyData.annual_revenue) }} €/an</p>
                <p v-else>Revenu annuel non renseigné</p>
            </div>

            <p class="mb-5">{{ companyData.description }}</p>

            <contact-card class="mx-auto" />

        </div>

    </div>
</template>

<script>
    import ContactCard from '@/Components/ContactCard'

    export default {
        components: {
            ContactCard,
        },

        props: ['company'],

        data() {
            return {
                companyData: this.company
            }
        },

        methods: {
            cancel() {
              this.$emit('cancel')  
            },

            addSpacesToNumber(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>