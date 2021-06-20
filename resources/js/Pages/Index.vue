<template>
    <index-header />
    <div v-for="(company, index) in companiesData" :key="index">
        <company-card :company="company" />
    </div>
</template>

<script>
    import IndexHeader from '@/Components/IndexHeader'
    import CompanyCard from '@/Components/CompanyCard'

    export default {
        components: {
            IndexHeader,
            CompanyCard,
        },

        props: ['companies'],

        data() {
            return {
                companiesData: this.companies
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>