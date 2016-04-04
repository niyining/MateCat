<?php

class Jobs_JobStruct extends DataAccess_AbstractDaoSilentStruct implements DataAccess_IDaoStruct, \ArrayAccess {
  public $id;
  public $password;
  public $id_project ;

  public $job_first_segment ;
  public $job_last_segment ;

  public $source ;
  public $target ;
  public $tm_keys ;

  public $id_translator;
  public $job_type;
  public $total_time_to_edit;
  public $avg_post_editing_effort;
  public $id_job_to_revise;
  public $last_opened_segment;
  public $id_tms;
  public $id_mt_engine;
  public $create_date;
  public $last_update;
  public $disabled;
  public $owner;
  public $status_owner;
  public $status_translator;
  public $status;
  public $completed = true; //Column 'completed' cannot be null
  public $new_words;
  public $draft_words;
  public $translated_words;
  public $approved_words;
  public $rejected_words;
  public $subject;
  public $payable_rates;
  public $revision_stats_typing_min;
  public $revision_stats_translations_min;
  public $revision_stats_terminology_min;
  public $revision_stats_language_quality_min;
  public $revision_stats_style_min;
  public $revision_stats_typing_maj;
  public $revision_stats_translations_maj;
  public $revision_stats_terminology_maj;
  public $revision_stats_language_quality_maj;
  public $revision_stats_style_maj;
  public $dqf_key;
  public $total_raw_wc;

  public function getFile() {
    return Files_FileDao::getByJobId( $this->id );
  }

  public function getProject() {
    return Projects_ProjectDao::findById( $this->id_project );
  }

  public function isFeatureEnabled( $feature_code ) {
    return $this->getProject()->isFeatureEnabled( $feature_code ) ;
  }

  public function findLatestTranslation() {
    $dao = new Translations_SegmentTranslationDao( Database::obtain() );
    return $dao->lastTranslationByJobOrChunk( $this );
  }

  public function getChunks() {
    $dao = new Chunks_ChunkDao( Database::obtain() );
    return $dao->getByProjectId( $this->id_project );
  }

  /**
   * This method is executed when using isset() or empty() on objects implementing ArrayAccess.
   *
   * @param mixed $offset
   *
   * @return bool
   */
  public function offsetExists( $offset ) {
    return property_exists( $this, $offset );
  }

  /**
   * @param mixed $offset
   * @returns mixed
   */
  public function offsetGet( $offset ) {
    return $this->__get( $offset );
  }

  /**
   * @param mixed $offset
   * @param mixed $value
   */
  public function offsetSet( $offset, $value ) {
    $this->__set( $offset, $value );
  }

  /**
   * @param mixed $offset
   */
  public function offsetUnset( $offset ) {
    $this->__set( $offset, null );
  }

}
