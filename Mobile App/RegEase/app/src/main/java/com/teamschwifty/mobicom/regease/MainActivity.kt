package com.teamschwifty.mobicom.regease


import android.content.Context
import android.content.Intent
import android.net.ConnectivityManager
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.support.v7.app.AlertDialog
import android.view.LayoutInflater
import android.view.View
import android.widget.Toast
import android.widget.EditText
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.ip_dialog.*
import kotlinx.android.synthetic.main.ip_dialog.view.*


class MainActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        this.checkConn()

        btnConnection.setOnClickListener{

            val cm = getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
            val ni = cm.activeNetworkInfo

            @Suppress("DEPRECATION")
            if (ni != null && ni.type == ConnectivityManager.TYPE_WIFI) {

                val mDialogView = LayoutInflater.from(this).inflate(R.layout.ip_dialog, null)
                val mBuilder = AlertDialog.Builder(this)
                        .setView(mDialogView)
                        .setTitle("Server IP Configuration")
                val mAlertDialog = mBuilder.show()

                mDialogView.btnCancel.setOnClickListener {
                    mAlertDialog.dismiss()
                }

                mDialogView.btnConfirm.setOnClickListener {
                    val ip = mDialogView.etIp.text.toString()

                    tvIp.setText(ip).toString()
                    if(ip.isEmpty()){
                        mAlertDialog.dismiss()

                    }
                    else{

                        mAlertDialog.dismiss()
                    }
                }

            }
            else{

                val intent = Intent (this@MainActivity, NoConnection::class.java)
                intent.putExtra("flag", "Main1")
                startActivity(intent)
                finish()
            }
        }


    }
    fun loginButton(view: View){
        val cm = getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
        val ni = cm.activeNetworkInfo

        @Suppress("DEPRECATION")
        if (ni != null && ni.type == ConnectivityManager.TYPE_WIFI) {

            val username = findViewById<EditText>(R.id.etUsername).text.toString()
            val password = findViewById<EditText>(R.id.etPassword).text.toString()

            if ( username == "warren" && password == "warren"){
                val intent = Intent (this@MainActivity, Main2Activity::class.java)
                intent.putExtra("name", "warren")
                startActivity(intent)
                finish()

            }
            else if(username == "paolo" && password == "paolo"){
                val intent = Intent (this@MainActivity, Main2Activity::class.java)
                intent.putExtra("name", "paolo")
                startActivity(intent)
                finish()
            }
            else{
                Toast.makeText(baseContext,"login failed", Toast.LENGTH_SHORT).show()
            }

        }
        else{
                    val intent = Intent (this@MainActivity, NoConnection::class.java)
                    intent.putExtra("flag", "Main")
                    startActivity(intent)
                    finish()
        }


    }



    private fun checkConn(){
        val cm = getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
        val ni = cm.activeNetworkInfo

        @Suppress("DEPRECATION")
        if (ni != null && ni.type == ConnectivityManager.TYPE_WIFI) {

            Toast.makeText(baseContext,"connected via wifi network",Toast.LENGTH_SHORT).show()

        }
        else{
                    val intent = Intent (this@MainActivity, NoConnection::class.java)
                    intent.putExtra("flag", "Main")
                    startActivity(intent)
                    finish()
        }
    }

}
