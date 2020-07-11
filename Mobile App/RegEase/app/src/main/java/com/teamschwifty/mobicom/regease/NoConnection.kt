package com.teamschwifty.mobicom.regease

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import java.util.*

class NoConnection : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_no_connection)



    }
    fun retryConnect(view: View){

        val checkFlag = intent.getStringExtra("flag")

        when (checkFlag) {
            ("Main") -> {
                val intent = Intent (this@NoConnection, MainActivity::class.java)
                startActivity(intent)
                finish()
            }
            ("Main2") -> {
                val intent = Intent (this@NoConnection, Main2Activity::class.java)
                startActivity(intent)
                finish()
            }
            ("Scan") -> {
                val intent = Intent (this@NoConnection, ScanActivity::class.java)
                startActivity(intent)
                finish()
            }
        }



    }
}
