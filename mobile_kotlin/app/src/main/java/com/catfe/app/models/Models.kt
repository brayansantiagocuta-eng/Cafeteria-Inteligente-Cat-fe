package com.example.cat_f.models

// Clase sencilla para las Mesas
data class Mesa(
    val numero: Int,
    var estado: String // "Libre" o "Ocupada"
)

// Clase sencilla para los Productos del menú
data class Producto(
    val nombre: String,
    val precio: Int,
    val stock: Int
)

// Clase sencilla para los Desperdicios (Mermas)
data class Desperdicio(
    val producto: String,
    val motivo: String,
    val perdidaDinero: Int
)
