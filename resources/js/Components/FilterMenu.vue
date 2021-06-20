<template>
    <div class="flex items-center justify-between space-x-2 mx-14 mt-14 mb-8">
        <div @click="filterIndustry('all')" class="py-2 px-6 font-montserrat font-medium text-2xl rounded-full border-2 border-purple select-none cursor-pointer transition duration-200 ease-in-out hover:bg-purple hover:text-white" :class="filter == 'all' ? 'bg-purple text-white' : 'text-purple'">
            <p>Toutes</p>
        </div>

        <div @click="filterIndustry('cosmetics')" class="py-2 px-6 font-montserrat font-medium text-2xl rounded-full border-2 border-purple select-none cursor-pointer transition duration-200 ease-in-out hover:bg-purple hover:text-white" :class="filter == 'cosmetics' ? 'bg-purple text-white' : 'text-purple'">
            <p>Cosmétiques</p>
        </div>

        <div @click="filterIndustry('consumer_electronics')" class="py-2 px-6 font-montserrat font-medium text-2xl rounded-full border-2 border-purple select-none cursor-pointer transition duration-200 ease-in-out hover:bg-purple hover:text-white" :class="filter == 'consumer_electronics' ? 'bg-purple text-white' : 'text-purple'">
            <p>Électronique grand public</p>
        </div>

        <div @click="filterIndustry('food_beverages')" class="py-2 px-6 font-montserrat font-medium text-2xl rounded-full border-2 border-purple select-none cursor-pointer transition duration-200 ease-in-out hover:bg-purple hover:text-white" :class="filter == 'food_beverages' ? 'bg-purple text-white' : 'text-purple'">
            <p>Aliments/Boissons</p>
        </div>

        <div @click="filterIndustry('computer_software')" class="py-2 px-6 font-montserrat font-medium text-2xl rounded-full border-2 border-purple select-none cursor-pointer transition duration-200 ease-in-out hover:bg-purple hover:text-white" :class="filter == 'computer_software' ? 'bg-purple text-white' : 'text-purple'">
            <p>Logiciels informatiques</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['filter'],

        methods: {
            filterIndustry: function(value) {
                this.$inertia.get(`/index/${value}`)
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>