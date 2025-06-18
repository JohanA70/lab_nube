<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Bienvenido, <span id="userNameDisplay"></span>!</h2>
                    <button id="btnAcceso" style="border: 1px solid black; border-radius: 5px;">Consultar Tipo de Cambio</button>
                    <p id="tipoCambio">Presiona el botón para obtener el tipo de cambio.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById("btnAcceso").addEventListener("click", async function() {
        try {
            const respuesta = await fetch("https://api.exchangerate-api.com/v4/latest/USD");
            const datos = await respuesta.json();

            const tipoCambio = datos.rates.CRC || "No disponible";
            document.getElementById("tipoCambio").textContent = `Tipo de cambio: ₡${tipoCambio}`;

            // Registrar consulta
            await fetch("/registrar-consulta", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            });

        } catch (error) {
            document.getElementById("tipoCambio").textContent = "Error al obtener el tipo de cambio.";
        }
    });
</script>