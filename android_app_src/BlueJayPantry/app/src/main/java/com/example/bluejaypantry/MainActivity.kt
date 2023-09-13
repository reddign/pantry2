package com.example.bluejaypantry

//Previous attempt at getting the data to pull
/*import android.os.Bundle
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import androidx.activity.ComponentActivity
import androidx.compose.runtime.Composable
import androidx.compose.ui.tooling.preview.Preview
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.GET

data class DataModel(
    val productID: String,
    val productName: String,
    val quantity: String,
    val catID: String,
    val img: String
    )

interface ApiService {
    // replace with the actual endpoint URL
    @GET("data_src/data.php?table=products")
    fun getData(): Call<DataModel>
}

class MainActivity : ComponentActivity() {
    private lateinit var recyclerViewData: RecyclerView
    private lateinit var adapter: DataAdapter
    private var data: List<DataModel> = emptyList()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        /*setContent {
            BlueJayPantryTheme {
                // A surface container using the 'background' color from the theme
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colorScheme.background
                ) {
                    GreetingImage("Welcome to the Blue Jay Pantry")
                }
            }*/
            setContentView(R.layout.activity_main)

            recyclerViewData = findViewById(R.id.recyclerViewData)
            adapter = DataAdapter(emptyList())

        private fun setupRecyclerView() {
            recyclerViewData = findViewById(R.id.recyclerViewData)
            adapter = DataAdapter(emptyList())
            recyclerViewData.layoutManager = LinearLayoutManager(this)
            recyclerViewData.adapter = adapter
        }

            val retrofit = Retrofit.Builder()
                .baseUrl("https://bluejaypantry.etowndb.com/")
                .addConverterFactory(GsonConverterFactory.create())
                .build()

            val apiService = retrofit.create(ApiService::class.java)

            apiService.getData().enqueue(object : Callback<DataModel> {
                override fun onResponse(call: Call<DataModel>, response: Response<DataModel>) {
                    if (response.isSuccessful) {
                        if (data != null) {
                            adapter.setData(data)
                        }
                    } else {
                        Log.e(TAG, "Failed to retrieve data: ${response.code()}")
                    }
                }

                override fun onFailure(call: Call<DataModel>, t: Throwable) {
                    Log.e(TAG, "Error retrieving data", t)
                }
            })
        }
        companion object {
            private const val TAG = "MainActivity"
        }
    }

    class DataAdapter : RecyclerView.Adapter<DataAdapter.ViewHolder>() {
        private val dataList: MutableList<DataModel> = mutableListOf()

        override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
            val view =
                LayoutInflater.from(parent.context).inflate(R.layout.item_data, parent, false)
            return ViewHolder(view)
        }

        override fun onBindViewHolder(holder: ViewHolder, position: Int) {
            val data = dataList[position]
            holder.bind(data)
        }

        override fun getItemCount(): Int {
            return dataList.size
        }

        fun setData(newData: List <DataModel>) {
            dataList.clear()
            dataList.addAll(newData)
        }

        inner class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
            private val textViewProductID: TextView = itemView.findViewById(R.id.textViewProductID)
            private val textViewProductName: TextView = itemView.findViewById(R.id.textViewProductName)
            private val textViewQuantity: TextView = itemView.findViewById(R.id.textViewQuantity)
            private val textViewCatID: TextView = itemView.findViewById(R.id.textViewCatID)
            private val textViewImg: TextView = itemView.findViewById(R.id.textViewImg)

            fun bind(data: DataModel) {
                textViewProductID.text = data.productID
                textViewProductName.text = data.productName
                textViewQuantity.text = data.quantity
                textViewCatID.text = data.catID
                textViewImg.text = data.img
            }
        }

    }

    /*@Composable
    fun Greeting(name: String, modifier: Modifier = Modifier) {
        Text(
            text = "\n\n$name",
            fontSize = 85.sp,
            lineHeight = 90.sp,
            textAlign = TextAlign.Center,
            modifier = modifier
        )
    }*/


    /*@Composable
    fun GreetingImage(message: String, modifier: Modifier = Modifier) {
        val image = painterResource(R.drawable.bluejaypantrylogo_1_)
        Box {
            Image(
                painter = image,
                contentDescription = null,
                contentScale = ContentScale.FillBounds,
                alpha = 0.5F
            )
            Greeting(
                name = message,
                modifier = modifier
                    .fillMaxSize()
                    .padding(16.dp)


            )
        }
    }*/

    @Preview(showBackground = true)
    @Composable
    fun GreetingPreview() {
        /*BlueJayPantryTheme {
            Surface(
                modifier = Modifier.fillMaxSize(),
                color = MaterialTheme.colorScheme.background
            ) {
                GreetingImage("Welcome to the Blue Jay Pantry")
            }
        }*/
    }*/

import android.os.Bundle
import androidx.activity.compose.setContent
import androidx.appcompat.app.AppCompatActivity
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.MutableState
import androidx.compose.runtime.mutableStateListOf
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.tooling.preview.Preview
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import kotlinx.coroutines.delay
import okhttp3.OkHttpClient
import okhttp3.Request
import okhttp3.Response
import org.json.JSONArray
import org.json.JSONObject

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MyApp()
        }
    }
}

data class DataModel(
    val productID: String,
    val productName: String,
    val quantity: String,
    val catID: String,
    val img: String
)

@Composable
fun MyApp() {
    MaterialTheme {
        Surface {
            val dataState: MutableState<List<DataModel>> = remember { mutableStateOf(emptyList()) }

            LaunchedEffect(true) {
                val newData = fetchData()
                dataState.value = newData
            }

            DataList(dataState.value)
        }
    }
}

@Composable
fun DataList(data: List<DataModel>) {
    LazyColumn {
        items(data) { item ->
            DataItem(item)
        }
    }
}

@Composable
fun DataItem(data: DataModel) {
    Text(text = "Product ID: ${data.productID}")
    Text(text = "Product Name: ${data.productName}")
    Text(text = "Quantity: ${data.quantity}")
    Text(text = "Category ID: ${data.catID}")
    Text(text = "Image: ${data.img}")
}

suspend fun fetchData(): List<DataModel> = withContext(Dispatchers.IO) {
    delay(2000)

    val client = OkHttpClient()
    val request = Request.Builder()
        .url("https://bluejaypantry.etowndb.com/data_src/data.php?table=products")
        .build()

    val response: Response = client.newCall(request).execute()

    if (response.isSuccessful) {
        val jsonData = response.body()?.string()
        parseJsonData(jsonData)
    } else {
        emptyList()
    }
}

fun parseJsonData(jsonData: String?): List<DataModel> {
    val dataList = mutableListOf<DataModel>()

    try {
        val jsonArray = JSONArray(jsonData)

        for (i in 0 until jsonArray.length()) {
            val jsonObject: JSONObject = jsonArray.getJSONObject(i)

            val productID = jsonObject.getString("productID")
            val productName = jsonObject.getString("productName")
            val quantity = jsonObject.getString("quantity")
            val catID = jsonObject.getString("catID")
            val img = jsonObject.getString("img")

            val data = DataModel(productID, productName, quantity, catID, img)
            dataList.add(data)
        }
    } catch (e: Exception) {
        e.printStackTrace()
    }

    return dataList
}

@Preview(showBackground = true)
@Composable
fun PantryPreview() {

}
