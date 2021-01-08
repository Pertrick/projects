package com.example.tourismapp.tourAdapter

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.tourismapp.R
import com.example.tourismapp.model.Places
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.tour_rv_layout.view.*

class TourAdapter (val context: Context?, private val  places:ArrayList<Places>): RecyclerView.Adapter<RecyclerView.ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): RecyclerView.ViewHolder {
        val v = LayoutInflater.from(parent.context).inflate(R.layout.tour_rv_layout, parent, false)
        return ViewHolder(v)
    }

    override fun getItemCount(): Int {
       return places.size
    }

    override fun onBindViewHolder(holder: RecyclerView.ViewHolder, position: Int) {
        //now we go bind the view and data here

        Picasso.get().load(places[position].url).into(holder.itemView.tourImage)

        //start keburns animation here
        holder.itemView.tourImage.resume()

        holder.itemView.tourTitle.text =places[position].tile
        holder.itemView.tourDescription.text = places[position].description
        holder.itemView.tourRating.rating = places[position].rating!!
    }


    //create ViewHolder class
    class ViewHolder(v: View?):RecyclerView.ViewHolder(v!!), View.OnClickListener{
        override fun onClick(v: View?) {
            TODO("Not yet implemented")
        }

        init{
            itemView.setOnClickListener(this)
        }

    }

}
