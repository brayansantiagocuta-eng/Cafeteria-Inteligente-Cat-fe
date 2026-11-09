package com.catfe.app.models

data class Mesa(
    val id: Int,
    val numero: Int,
    val capacidad: Int,
    var estado: String // "DISPONIBLE", "OCUPADA", "POR_COBRAR"
)

data class Producto(
    val id: Int,
    val nombre: String,
    val categoria: String,
    val precio: Double,
    val stock: Int
)

data class ItemComanda(
    val producto: Producto,
    var cantidad: Int,
    var nota: String = ""
)

data class RespuestaApi<T>(
    val success: Boolean,
    val data: T?,
    val message: String?
)
