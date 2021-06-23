<template>
<div class="flex justify-between space-x-20 mb-5">
    <div class="flex">

        <div class="mr-5 p-20 bg-purple"></div>

        <div class="flex flex-col font-montserrat font-medium text-lg">
            <h2 class="mb-3 capitalize font-bold text-purple text-2xl">{{ companyData.name }}</h2>
            <a :href="'//' + companyData.domain" target="_blank" class="underline hover:text-purple transition duration-200 ease-in-out">{{ companyData.domain }}</a>
            <a v-if="companyData.phone" class="mb-3">{{ companyData.phone }}</a>
            <p v-else class="mb-3">Téléphone non renseigné</p>

            <div class="flex items-center">
                <a :href="'mailto:' + contact.email" class="mr-5"><i class="text-purple text-xl fas fa-envelope"></i></a>
                <a v-if="companyData.phone" :href="'tel:' + formattedPhone"><i class="text-purple text-xl transform rotate-90 fas fa-phone"></i></a>
            </div>

        </div>
        
    </div>

    <div class="text-right font-montserrat font-medium text-lg">
        <div v-if="companyData.city && companyData.zip_code && companyData.country">
            <p class="mb-3 text-2xl">{{ companyData.city }}</p>
            <p>{{ companyData.zip_code }}</p>
            <p>{{ companyData.country }}</p>
        </div>
        <p v-else class="text-2xl">Adresse inconnue</p>
    </div>
</div>
</template>

<script>
    export default {
        props: ['company', 'contact'],

        data() {
            return {
                companyData: this.company,
                formattedPhone: '',
            }
        },

        mounted () {
            this.formatPhone();
        },

        methods: {
            formatPhone: function() {
                if (this.companyData.phone) {
                    if (this.companyData.phone.charAt(0) != '+') {
                        this.companyData.phone = '+' + this.companyData.phone
                    }
                    this.formattedPhone = this.companyData.phone.replaceAll(" ", "");
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>