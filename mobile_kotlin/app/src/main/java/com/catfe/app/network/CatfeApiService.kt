package com.catfe.app.network

import com.catfe.app.models.Mesa
import com.catfe.app.models.Producto
import com.catfe.app.models.RespuestaApi
import retrofit2.Call
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST

interface CatfeApiService {

    @GET("api.php?action=mesas")
    fun obtenerMesas(): Call<RespuestaApi<List<Mesa>>>

    @GET("api.php?action=productos")
    fun obtenerProductos(): Call<RespuestaApi<List<Producto>>>

    @POST("api.php?action=comanda")
    fun enviarComanda(@Body comandaPayload: Map<String, Any>): Call<Map<String, Any>>
}

object RetrofitClient {
    // 10.0.2.2 es la IP del localhost (XAMPP de tu PC) desde el emulador de Android
    private const val BASE_URL = "http://10.0.2.2/Cat-f%C3%A9/public/"

    val instance: CatfeApiService by lazy {
        Retrofit.Builder()
            .baseUrl(BASE_URL)
            .addConverterFactory(GsonConverterFactory.create())
            .build()
            .create(CatfeApiService::class.java)
    }
}
