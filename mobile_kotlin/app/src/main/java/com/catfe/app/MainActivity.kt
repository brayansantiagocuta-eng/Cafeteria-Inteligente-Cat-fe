package com.example.cat_f

import android.os.Bundle
import android.widget.Toast
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.*
import androidx.compose.runtime.*
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.cat_f.models.Desperdicio
import com.example.cat_f.models.Mesa
import com.example.cat_f.models.Producto
import com.example.cat_f.ui.theme.CatféTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            CatféTheme {
                PantallaPrincipalCatfe()
            }
        }
    }
}

@Composable
fun PantallaPrincipalCatfe() {
    val contexto = LocalContext.current

    // Variable para cambiar entre las 3 pantallas (1: Mesas, 2: Más Vendidos, 3: Desperdicios)
    var pantallaActual by remember { mutableIntStateOf(1) }

    // Lista sencilla de mesas
    val listaMesas = remember {
        mutableStateListOf(
            Mesa(1, "Libre"),
            Mesa(2, "Ocupada"),
            Mesa(3, "Libre"),
            Mesa(4, "Ocupada")
        )
    }

    // Lista sencilla de productos más vendidos
    val listaMasVendidos = listOf(
        Producto("1. Capuchino Cat-fé", 8500, 25),
        Producto("2. Cheesecake de Arándanos", 12000, 8),
        Producto("3. Latte Vainilla Star-Light", 9000, 18)
    )

    // Lista sencilla de desperdicios
    val listaDesperdicios = remember {
        mutableStateListOf(
            Desperdicio("Leche de Almendras", "Vencido", 12000),
            Desperdicio("Capuchino Cat-fé", "Se quemó la leche", 2800)
        )
    }

    Column(
        modifier = Modifier
            .fillMaxSize()
            .background(Color(0xFFF5EBE1)) // Color crema suave
            .padding(16.dp)
    ) {
        // TÍTULO SUPERIOR
        Text(
            text = "🐾 Cafetería Cat-fé (Star-Light)",
            fontSize = 22.sp,
            fontWeight = FontWeight.Bold,
            color = Color(0xFF2C1810)
        )
        Spacer(modifier = Modifier.height(12.dp))

        // BOTONES PARA CAMBIAR DE PANTALLA
        Row(
            modifier = Modifier.fillMaxWidth(),
            horizontalArrangement = Arrangement.SpaceEvenly
        ) {
            Button(onClick = { pantallaActual = 1 }) { Text("Mesas") }
            Button(onClick = { pantallaActual = 2 }) { Text("Más Vendidos") }
            Button(onClick = { pantallaActual = 3 }) { Text("Desperdicios") }
        }

        Spacer(modifier = Modifier.height(16.dp))

        // MOSTRAR LA PANTALLA SEGÚN EL BOTÓN ELEGIDO
        if (pantallaActual == 1) {
            Text("Estado de las Mesas:", fontSize = 18.sp, fontWeight = FontWeight.Bold)
            Spacer(modifier = Modifier.height(8.dp))

            LazyColumn {
                items(listaMesas) { mesa ->
                    Card(
                        modifier = Modifier
                            .fillMaxWidth()
                            .padding(vertical = 6.dp)
                    ) {
                        Row(
                            modifier = Modifier
                                .fillMaxWidth()
                                .padding(16.dp),
                            horizontalArrangement = Arrangement.SpaceBetween,
                            verticalAlignment = Alignment.CenterVertically
                        ) {
                            Text("Mesa #${mesa.numero} - ${mesa.estado}", fontSize = 16.sp, fontWeight = FontWeight.Bold)

                            Button(onClick = {
                                // Cambia entre Libre y Ocupada con un clic
                                val indice = listaMesas.indexOf(mesa)
                                val nuevoEstado = if (mesa.estado == "Libre") "Ocupada" else "Libre"
                                listaMesas[indice] = Mesa(mesa.numero, nuevoEstado)
                                Toast.makeText(contexto, "Mesa #${mesa.numero} ahora está $nuevoEstado", Toast.LENGTH_SHORT).show()
                            }) {
                                Text(if (mesa.estado == "Libre") "Ocupar" else "Cobrar / Liberar")
                            }
                        }
                    }
                }
            }
        }

        if (pantallaActual == 2) {
            Text("⭐ Productos Más Vendidos:", fontSize = 18.sp, fontWeight = FontWeight.Bold)
            Spacer(modifier = Modifier.height(8.dp))

            LazyColumn {
                items(listaMasVendidos) { prod ->
                    Card(
                        modifier = Modifier
                            .fillMaxWidth()
                            .padding(vertical = 6.dp)
                    ) {
                        Column(modifier = Modifier.padding(16.dp)) {
                            Text(prod.nombre, fontSize = 16.sp, fontWeight = FontWeight.Bold)
                            Text("Precio: $${prod.precio} - Stock disponible: ${prod.stock}")
                        }
                    }
                }
            }
        }

        if (pantallaActual == 3) {
            Text("⚠️ Control de Desperdicios:", fontSize = 18.sp, fontWeight = FontWeight.Bold)
            Spacer(modifier = Modifier.height(8.dp))

            Button(
                onClick = {
                    listaDesperdicios.add(Desperdicio("Porción de Torta", "Se dañó", 5000))
                    Toast.makeText(contexto, "Desperdicio guardado", Toast.LENGTH_SHORT).show()
                },
                modifier = Modifier.fillMaxWidth()
            ) {
                Text("+ Registrar Nuevo Desperdicio")
            }

            Spacer(modifier = Modifier.height(8.dp))

            LazyColumn {
                items(listaDesperdicios) { item ->
                    Card(
                        modifier = Modifier
                            .fillMaxWidth()
                            .padding(vertical = 6.dp)
                    ) {
                        Column(modifier = Modifier.padding(16.dp)) {
                            Text("Producto: ${item.producto}", fontWeight = FontWeight.Bold)
                            Text("Motivo: ${item.motivo}")
                            Text("Dinero perdido: -$${item.perdidaDinero}", color = Color.Red, fontWeight = FontWeight.Bold)
                        }
                    }
                }
            }
        }
    }
}
