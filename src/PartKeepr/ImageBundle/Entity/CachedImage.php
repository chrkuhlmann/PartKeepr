<?php
namespace PartKeepr\ImageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PartKeepr\UploadedFileBundle\Entity\UploadedFile;
use PartKeepr\CoreBundle\Entity\BaseEntity;

/**
 * Represents a cached image. Cached images are used for scale/resize
 * operations, so that the resize/scale operation doesn't need to be done
 * every time a scaled/resized image is requested.
 *
 * @ORM\Entity
 */
class CachedImage extends BaseEntity
{
    /**
     * Specifies the ID of the original image
     *
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $originalId;

    /**
     * Specifies the type of the original image.
     *
     * @var string
     * @ORM\Column(type="string")
     **/
    private $originalType;

    /**
     * The cache filename of the image
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $cacheFile;

    /**
     * Creates a new cache entry for a specific image.
     *
     * @param UploadedFile $image     The image to cache
     * @param string       $cacheFile The file which holds the cached image
     */
    public function __construct(UploadedFile $image, $cacheFile)
    {
        $this->originalId = (int)$image->getId();
        $this->originalType = $image->getType();
        $this->cacheFile = $cacheFile;
    }

    /**
     * Returns the cache file
     *
     * @return string The cache file including path
     */
    public function getCacheFile()
    {
        return $this->cacheFile;
    }

    /**
     * Returns the original ID
     *
     * @return int
     */
    public function getOriginalId()
    {
        return $this->originalId;
    }

    /**
     * Returns the original type
     *
     * @return string
     */
    public function getOriginalType()
    {
        return $this->originalType;
    }
}
