<template>
    <div class="flex items-center space-x-20 w-full mx-12 p-5 bg-purple-light rounded-3xl font-montserrat font-medium text-lg text-gray-900 shadow">
        <div class="flex items-center">

            <div class="p-8 mr-5 bg-purple-medium"></div>

            <div class="capitalize">
                <p>{{ contact.first_name }}</p>
                <p>{{ contact.last_name }}</p>
            </div>
            
        </div>

        <div>
            <p>{{ contact.email }}</p>
            <p v-if="contact.phone">{{ contact.phone }}</p>
            <p v-else>Téléphone non renseigné</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['contact'],
    }
</script>