

package com.teamschwifty.mobicom.regease

import android.content.DialogInterface
import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.VolleyError
import com.android.volley.toolbox.StringRequest
import com.google.zxing.integration.android.IntentIntegrator
import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog
import org.json.JSONObject
import java.util.HashMap


class ScanActivity : AppCompatActivity() {

    private var URL :String?=null
    private var eventID :String?=null
    private var pcID :String?=null


    private var customURL : String?=null

    private var PCID : String?=null
    private var EVENTID : String?=null


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_scan)

        customURL =intent.getStringExtra("customURL")
        PCID =intent.getStringExtra("pcID")
        EVENTID =intent.getStringExtra("eventID")


        URL= customURL.toString()
        eventID= EVENTID.toString()
        pcID= PCID.toString()

        if(URL.isNullOrEmpty()){
            val scanDialog= SweetAlertDialog(this, SweetAlertDialog.ERROR_TYPE)
            scanDialog.setTitleText("Input Valid URL")
            scanDialog.setCancelable(true)
            scanDialog.show()
            val handler = Handler()
            val runnable = Runnable {
                if (scanDialog.isShowing()) {
                    scanDialog.dismiss()
                }
            }
            scanDialog.setOnDismissListener(DialogInterface.OnDismissListener { handler.removeCallbacks(runnable) })
            handler.postDelayed(runnable, 2000)
        }else if(eventID.isNullOrEmpty()){
            val scanDialog= SweetAlertDialog(this, SweetAlertDialog.ERROR_TYPE)
            scanDialog.setTitleText("Input valid Event ID")
            scanDialog.setCancelable(true)
            scanDialog.show()
            val handler = Handler()
            val runnable = Runnable {
                if (scanDialog.isShowing()) {
                    scanDialog.dismiss()
                }
            }
            scanDialog.setOnDismissListener(DialogInterface.OnDismissListener { handler.removeCallbacks(runnable) })
            handler.postDelayed(runnable, 2000)

        }else if(pcID.isNullOrEmpty()){
            val scanDialog= SweetAlertDialog(this, SweetAlertDialog.ERROR_TYPE)
            scanDialog.setTitleText("Input Valid ")
            scanDialog.setCancelable(true)
            scanDialog.show()
            val handler = Handler()
            val runnable = Runnable {
                if (scanDialog.isShowing()) {
                    scanDialog.dismiss()
                }
            }
            scanDialog.setOnDismissListener(DialogInterface.OnDismissListener { handler.removeCallbacks(runnable) })
            handler.postDelayed(runnable, 2000)
        }
        else{

            scanning()
        }



    }


    fun scanning(){

        val integrator =  IntentIntegrator(this)
        integrator.setDesiredBarcodeFormats(IntentIntegrator.ALL_CODE_TYPES)
        integrator.setPrompt("Scan")
        integrator.setCameraId(0)
        integrator.setBeepEnabled(true)
        integrator.setBarcodeImageEnabled(true)
        integrator.setOrientationLocked(true)

        integrator.initiateScan()



    }
    private fun insert(){
        // pd!!.setMessage("Inserting Data..")
        // pd!!.show()

        val stringRequest = object: StringRequest(Request.Method.POST,URL,
                Response.Listener<String>{ response ->

                    // pd!!.dismiss()
                    val obj = JSONObject(response)

                    Toast.makeText(applicationContext,obj.getString("studentname"), Toast.LENGTH_LONG).show()

                }, object: Response.ErrorListener{

            override fun onErrorResponse(p0: VolleyError?) {

                // pd!!.dismiss()
                Toast.makeText(applicationContext,p0?.message, Toast.LENGTH_SHORT).show()

            }
        })
        {
            override fun getParams(): MutableMap<String, String> {
                val params = HashMap<String, String>()

                params.put("studentid","HAHA")
                params.put("studentname","HAH")
                params.put("studentsection","AHAHA")

                return params
            }
        }

        VolleySingleton.instance?.addToRequestQueue(stringRequest)

    }



    protected override fun onActivityResult(requestCode:Int, resultCode:Int, data: Intent?) {
        val result = IntentIntegrator.parseActivityResult(requestCode, resultCode, data)
        if (result != null) {
            if (result.getContents() == null) {
                Toast.makeText(this, "You canceled scanning !", Toast.LENGTH_SHORT).show()
                finish()
            } else {
                Toast.makeText(this,result.getContents().toString(),Toast.LENGTH_SHORT).show()
                ///////
                val stringRequest = object: StringRequest(Request.Method.POST,URL,
                        Response.Listener<String>{ response ->
                            // pDialog.dismiss()
                            // getting the json from php
                            val obj = JSONObject(response)

                            val scanDialog= SweetAlertDialog(this, SweetAlertDialog.SUCCESS_TYPE)
                            scanDialog.setTitleText(obj.getString("studentid"))
                            scanDialog.setContentText(obj.getString("response"))
                            scanDialog.setCancelable(true)
                            scanDialog.show()
                            val handler = Handler()
                            val runnable = Runnable {
                                if (scanDialog.isShowing()) {
                                    scanDialog.dismiss()
                                }
                            }
                            scanDialog.setOnDismissListener(DialogInterface.OnDismissListener { handler.removeCallbacks(runnable) })
                            handler.postDelayed(runnable,   2000)



                        }, object: Response.ErrorListener{

                    override fun onErrorResponse(p0: VolleyError?) {

                        // pDialog.dismiss()

                        val scanDialog= SweetAlertDialog(this@ScanActivity, SweetAlertDialog.ERROR_TYPE)
                        scanDialog.setTitleText(p0?.message)
                        scanDialog.setCancelable(true)
                        scanDialog.show()
                        val handler = Handler()
                        val runnable = Runnable {
                            if (scanDialog.isShowing()) {
                                scanDialog.dismiss()

                            }
                        }
                        scanDialog.setOnDismissListener(DialogInterface.OnDismissListener { handler.removeCallbacks(runnable) })
                        handler.postDelayed(runnable, 2000)
                        Toast.makeText(applicationContext,p0?.message, Toast.LENGTH_SHORT).show()

                    }
                })
                {
                    override fun getParams(): MutableMap<String, String> {
                        val params = HashMap<String, String>()
                        params.put("studentNum",result.getContents().toString())
                        params.put("eventID",eventID.toString())
                        params.put("pcID",pcID.toString())
                        return params
                    }
                }

                VolleySingleton.instance?.addToRequestQueue(stringRequest)
                ///
            }
        } else {
            super.onActivityResult(requestCode, resultCode, data)

        }
    }



}
