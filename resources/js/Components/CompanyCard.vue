<template>
    <div class="flex items-center justify-between mx-6 p-8 rounded-3xl transition duration-200 ease-in-out hover:bg-purple-light hover:shadow font-montserrat font-medium text-gray-900 text-2xl">
        <div class="w-1/5 flex items-center space-x-10">
            <div class="p-14 bg-purple"></div>
            <p class="capitalize">{{ companyData.name }}</p>
        </div>
        <div class="w-1/5">
            <p v-if="companyData.industry">{{ companyData.industry }}</p>
            <p v-else>Non renseigné</p>
        </div>
        <div class="w-1/6 ">
            <p v-if="companyData.city">{{ companyData.city }}</p>
            <p v-else>Non renseigné</p>
        </div>
        <div class="w-1/6">
            <p v-if="companyData.country">{{ companyData.country }}</p>
            <p v-else>Non renseigné</p>
        </div>
        <div @click="togglePopUp" class="py-4 px-12 bg-purple text-white rounded-full cursor-pointer select-none">
            Voir la fiche
        </div>
    </div>

    <pop-up v-if="showPopUp" @cancel="cancel" :company="companyData" />
</template>

<script>
    import PopUp from '@/Components/PopUp'

    export default {
        components : {
            PopUp,
        },

        props: ['company'],

        data() {
            return {
                companyData: this.company,
                showPopUp: false,
            }
        },
        
        methods: {
            togglePopUp: function() {
                this.showPopUp = true
            },

            cancel: function() {
                this.showPopUp = false
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>