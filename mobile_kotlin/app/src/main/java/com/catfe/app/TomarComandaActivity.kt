package com.catfe.app

import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.catfe.app.network.RetrofitClient
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class TomarComandaActivity : AppCompatActivity() {

    private var mesaId: Int = 1
    private var totalAcumulado: Double = 0.0

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tomar_comanda)

        mesaId = intent.getIntExtra("MESA_ID", 1)
        val tvMesaInfo = findViewById<TextView>(R.id.tvMesaTitulo)
        val tvTotal = findViewById<TextView>(R.id.tvTotalCalculado)
        val btnEnviarBarra = findViewById<Button>(R.id.btnEnviarBarra)

        tvMesaInfo.text = "Toma de Comanda - Mesa #$mesaId"

        btnEnviarBarra.setOnClickListener {
            enviarOrdenABarra()
        }
    }

    private fun enviarOrdenABarra() {
        val payload = mapOf(
            "mesa_id" to mesaId,
            "items" to listOf(
                mapOf("producto_id" to 1, "cantidad" to 2, "nota" to "Leche almendra"),
                mapOf("producto_id" to 4, "cantidad" to 1, "nota" to "Para compartir")
            ),
            "total" to 29000.0
        )

        RetrofitClient.instance.enviarComanda(payload).enqueue(object : Callback<Map<String, Any>> {
            override fun onResponse(call: Call<Map<String, Any>>, response: Response<Map<String, Any>>) {
                if (response.isSuccessful) {
                    Toast.makeText(this@TomarComandaActivity, "🐾 ¡Comanda enviada a barra exitosamente!", Toast.LENGTH_LONG).show()
                    finish()
                } else {
                    Toast.makeText(this@TomarComandaActivity, "Error al enviar comanda", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<Map<String, Any>>, t: Throwable) {
                Toast.makeText(this@TomarComandaActivity, "Error de red con el backend", Toast.LENGTH_SHORT).show()
            }
        })
    }
}
