package com.teamschwifty.mobicom.regease

import android.content.Context
import android.content.DialogInterface
import android.content.Intent
import android.net.ConnectivityManager
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.support.v7.widget.Toolbar
import android.view.Menu
import android.view.MenuItem
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.VolleyError
import com.android.volley.toolbox.StringRequest
import com.google.zxing.integration.android.IntentIntegrator
import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog
import kotlinx.android.synthetic.main.activity_main2.*
import org.json.JSONObject
import java.util.*


class Main2Activity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main2)
        this.checkConn()



        val mtoolbar = findViewById<View>(R.id.toolbar) as Toolbar

        val checkName = intent.getStringExtra("name")

        when(checkName){

            ("warren") -> {
                mtoolbar!!.title = "Welcome,Warren D."
            }
            ("paolo") -> {
                mtoolbar!!.title = "Welcome,Paolo E."
            }
        }
        setSupportActionBar(mtoolbar)


    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.main_menu,menu)
        return super.onCreateOptionsMenu(menu)
    }

    override fun onOptionsItemSelected(item: MenuItem?): Boolean {
        val id = item?.itemId
        when(id){
            R.id.logout -> {
                val intent = Intent (this@Main2Activity, MainActivity::class.java)
                startActivity(intent)
                finish()
            }
            R.id.about -> {

                Toast.makeText(this,"Alpha version will update to add more bugs :)",Toast.LENGTH_LONG).show()

            }
        }

        return super.onOptionsItemSelected(item)
    }

    private fun checkConn(){
        val cm = getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
        val ni = cm.activeNetworkInfo

        @Suppress("DEPRECATION")
        if (ni != null && ni.type == ConnectivityManager.TYPE_WIFI) {


        }
        else{
            Timer().schedule( object : TimerTask(){
                override fun run() {
                    val intent = Intent (this@Main2Activity, NoConnection::class.java)
                    intent.putExtra("flag", "Main2")
                    startActivity(intent)
                    finish()
                }

            } , 0L)
        }
    }


    fun scan(view: View){
        val cm = getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
        val ni = cm.activeNetworkInfo

        @Suppress("DEPRECATION")
        if (ni != null && ni.type == ConnectivityManager.TYPE_WIFI){

            val intent = Intent (this@Main2Activity, ScanActivity::class.java)
            intent.putExtra("customURL",tvURL.text.toString())
            intent.putExtra("pcID",tvPCID.text.toString())
            intent.putExtra("eventID",tvEVENTID.text.toString())

            startActivity(intent)

        }
        else{

            val intent = Intent (this@Main2Activity, NoConnection::class.java)
            intent.putExtra("flag", "Main2")
            startActivity(intent)
        }

    }


}
