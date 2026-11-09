package com.catfe.app

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.GridLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.catfe.app.models.Mesa
import com.catfe.app.models.RespuestaApi
import com.catfe.app.network.RetrofitClient
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {

    private lateinit var rvMesas: RecyclerView
    private lateinit var btnActualizar: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        rvMesas = findViewById(R.id.rvMesas)
        btnActualizar = findViewById(R.id.btnActualizar)
        rvMesas.layoutManager = GridLayoutManager(this, 2)

        cargarMesas()

        btnActualizar.setOnClickListener {
            cargarMesas()
        }
    }

    private fun cargarMesas() {
        Toast.makeText(this, "Consultando mesas...", Toast.LENGTH_SHORT).show()
        RetrofitClient.instance.obtenerMesas().enqueue(object : Callback<RespuestaApi<List<Mesa>>> {
            override fun onResponse(
                call: Call<RespuestaApi<List<Mesa>>>,
                response: Response<RespuestaApi<List<Mesa>>>
            ) {
                if (response.isSuccessful && response.body()?.success == true) {
                    val listaMesas = response.body()?.data ?: emptyList()
                    // Abre comanda con la primera mesa seleccionada
                    Toast.makeText(this@MainActivity, "Mesas sincronizadas: ${listaMesas.size}", Toast.LENGTH_LONG).show()
                } else {
                    Toast.makeText(this@MainActivity, "Error al procesar mesas", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<RespuestaApi<List<Mesa>>>, t: Throwable) {
                Toast.makeText(this@MainActivity, "Fallo de conexión con servidor XAMPP", Toast.LENGTH_LONG).show()
            }
        })
    }
}
