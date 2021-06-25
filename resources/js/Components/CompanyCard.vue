<template>
    <div @click="togglePopUp" class="flex items-center justify-between mx-6 p-8 rounded-3xl cursor-pointer transition duration-200 ease-in-out hover:bg-purple-light hover:shadow font-montserrat font-medium text-gray-900 text-2xl">

        <div class="w-1/5 flex items-center space-x-10">
            <img v-if="companyData.logo_url" :src="'https://cdn2.hubspot.net/' + companyData.logo_url" class="w-28" alt="Logo de l'entreprise" />
            <div v-else class="p-14 bg-purple-medium"></div>
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

        <div class="py-4 px-12 bg-purple text-white rounded-full transition duration-200 ease-in-out transform hover:scale-105 select-none">
            Voir la fiche
        </div>

    </div>

    <pop-up v-if="showPopUp" @cancel="cancel" :company="companyData" :contact="contactData" />
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
                contactData: '',
                showPopUp: false,
            }
        },
        
        methods: {
            togglePopUp: function() {
                this.showPopUp = true
                this.getContact()
            },

            cancel: function() {
                this.showPopUp = false
            },

            getContact: function() {
                axios.get('/contact/' + this.companyData.id).then(response => this.contactData = response.data);
            },
        },
    }
</script>