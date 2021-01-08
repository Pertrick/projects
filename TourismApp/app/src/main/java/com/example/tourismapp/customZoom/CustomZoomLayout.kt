package com.example.tourismapp.customZoom


import android.content.Context
import android.graphics.drawable.GradientDrawable
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import java.lang.Float.min
import java.lang.Math.abs
import java.lang.Math.min

class CustomZoomLayout : LinearLayoutManager {

    private val mShrinkAmount =0.15f
    private  val mShrinkDistance  = 0.9f

    constructor(context: Context) :super(context)

    constructor(context: Context, orientation: Int, reverseLayout: Boolean):
            super(
                  context, orientation, reverseLayout
            )

    override fun scrollHorizontallyBy(
        dx: Int,
        recycler: RecyclerView.Recycler?,
        state: RecyclerView.State?
    ): Int {
        val orientation = orientation
        if(orientation == HORIZONTAL){
            var scrolled = super.scrollHorizontallyBy(dx, recycler,state)

            val midpoint = width/2f
            val d0 = 0f
            val d1 = mShrinkDistance *midpoint
            val s0 =1f
            val s1 = 1f - mShrinkAmount

            for(i in 0 until childCount){

                var child = getChildAt(i)
                val childMidPoint = (getDecoratedRight(child!!) + getDecoratedLeft(child)/2f)

                val d = d1.coerceAtMost(abs(midpoint - childMidPoint))
                val scale = s0 +(s1-s0) * (d-d0)/(d1-d0)
                child.scaleX = scale
                child.scaleY =scale
            }


            return scrolled

        }else{
            return 0
        }


    }
}