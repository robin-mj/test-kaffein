<template>
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
</template>

<script>
    export default {
        props: ['company'],

        data() {
            return {
                companyData: this.company,
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>