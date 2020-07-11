package com.teamschwifty.mobicom.regease.activities

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import com.teamschwifty.mobicom.regease.MainActivity
import com.teamschwifty.mobicom.regease.R
import java.util.*

class SplashScreen : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_splash_screen)
        Timer().schedule( object : TimerTask(){
            override fun run() {
                val intent = Intent (this@SplashScreen,MainActivity::class.java)
                startActivity(intent)
                finish()
            }

        } , 1200L)
    }
}
