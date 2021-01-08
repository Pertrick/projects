package com.example.tourismapp

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.WindowManager
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.LinearSnapHelper
import androidx.recyclerview.widget.RecyclerView
import com.example.tourismapp.customZoom.CustomZoomLayout
import com.example.tourismapp.model.Places
import com.example.tourismapp.tourAdapter.TourAdapter

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        window.setFlags(
            WindowManager.LayoutParams.FLAG_FULLSCREEN,
            WindowManager.LayoutParams.FLAG_FULLSCREEN
        )

        setContentView(R.layout.activity_main)

        val tourRV = findViewById<RecyclerView>(R.id.tourRV)

        //init layout manager here
        val layoutManager = CustomZoomLayout(this)
        layoutManager.orientation = LinearLayoutManager.HORIZONTAL
        layoutManager.reverseLayout = true
        layoutManager.stackFromEnd = true
        tourRV.layoutManager =layoutManager


        //To auto Center views
        val snapHelper = LinearSnapHelper()
        snapHelper.attachToRecyclerView(tourRV)
        tourRV.isNestedScrollingEnabled = false

        //add items to array list
        val places = ArrayList<Places>()

        places.add(
            Places(
            "Los Angeles",
            "Los Angeles is a southern Califonia city and the center of the nation's film and television industry",
            4.5f, "https://images.unsplash.com/photo-1515896769750-31548aa180ed?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=834&q=80")

        )

        places.add(
            Places(
                "Lagos",
                "Lagos (Yoruba: Èkó) is the most populous city in Nigeria and the African continent. Lagos is a major financial centre for all of Africa and is the economic hub of Lagos State. The megacity has the fourth-highest GDP in Africa and houses one of the largest and busiest seaports on the continent. It is one of the fastest growing cities in the world.",
                4.5f, "https://images.unsplash.com/photo-1589797688224-5fc840fa09e5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80")

        )

        places.add(
            Places(
                "China",
                "China, officially the people's republic of China, it has a population of around 1.428 Bilion in 2017",
                4.0f, "https://images.unsplash.com/photo-1547981609-4b6bfe67ca0b?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80")

        )

        places.add(
            Places(
                "India",
                "India, is the second largest population in the world. India is most visited country in the world",
                5.0f, "https://images.unsplash.com/photo-1524492412937-b28074a5d7da?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80")

        )

        //Add arraylist  to recycler view

        tourRV.adapter = TourAdapter(this,  places)

    }
}