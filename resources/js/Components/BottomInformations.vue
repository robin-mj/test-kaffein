<template>
<div>

    <div class="flex items-center space-x-8 mb-5 font-montserrat font-semibold text-lg text-purple">

        <p v-if="companyData.industry">{{ companyData.industry }}</p>
        <p v-else>Secteur inconnu</p>

        <p v-if="companyData.number_of_employees">{{ addSpacesToNumber(companyData.number_of_employees) }} employés</p>
        <p v-else>Nombre d'employés inconnu</p>

        <p v-if="companyData.annual_revenue">{{ addSpacesToNumber(companyData.annual_revenue) }} €/an</p>
        <p v-else>Revenu inconnu</p>

    </div>

    <p v-if="companyData.description" class="mb-5">{{ companyData.description }}</p>
    <p v-else class="mb-5">Description indisponible</p>

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

        methods: {
            addSpacesToNumber: function(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>